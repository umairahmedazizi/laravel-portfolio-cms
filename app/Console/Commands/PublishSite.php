<?php

namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\ContactLink;
use App\Models\Project;
use App\Models\Setting;
use App\Models\SkillCategory;
use App\Models\SocialLink;
use App\Models\Stat;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishSite extends Command
{
    protected $signature = 'site:publish';

    protected $description = 'Render the portfolio to a static index.html in the public site folder';

    public function handle(): int
    {
        $out = rtrim(env('SITE_PUBLISH_PATH', 'E:/Portfolio'), '/\\');

        if (! File::isDirectory($out)) {
            $this->error("Output folder not found: {$out}");
            $this->line('Set SITE_PUBLISH_PATH in .env to your static site folder.');

            return self::FAILURE;
        }

        $s = Setting::map();
        $domain = rtrim($s['seo_domain'] ?? '', '/');

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $s['hero_name'] ?? 'Jordan Lee',
            'url' => $domain . '/',
            'image' => $domain . '/' . ($s['hero_image'] ?? ''),
            'jobTitle' => $s['about_role'] ?? '',
            'description' => $s['seo_description'] ?? '',
            'knowsAbout' => ['MongoDB', 'Express', 'Angular', 'React', 'Node.js', 'REST APIs', 'System Architecture'],
            'alumniOf' => [
                '@type' => 'CollegeOrUniversity',
                'name' => 'Northgate University',
                'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'London', 'addressCountry' => 'PK'],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $data = [
            's'          => $s,
            'jsonLd'     => $jsonLd,
            'projects'   => Project::orderBy('sort')->get(),
            'stats'      => Stat::orderBy('sort')->get(),
            'skills'     => SkillCategory::orderBy('sort')->get(),
            'activities' => Activity::orderBy('sort')->get(),
            'contacts'   => ContactLink::orderBy('sort')->get(),
            'socials'    => SocialLink::orderBy('sort')->get(),
        ];

        $html = ltrim(view('site', $data)->render());

        // Copy any uploaded screenshots referenced by projects into the site folder.
        foreach ($data['projects'] as $project) {
            if ($project->screenshot) {
                $src = storage_path('app/public/' . ltrim($project->screenshot, '/'));
                $dest = $out . '/' . ltrim($project->screenshot, '/');
                if (File::exists($src)) {
                    File::ensureDirectoryExists(dirname($dest));
                    File::copy($src, $dest);
                }
            }
        }

        File::put($out . '/index.html', $html);

        $kb = round(strlen($html) / 1024, 1);
        $this->info("Published → {$out}/index.html ({$kb} KB)");

        return self::SUCCESS;
    }
}
