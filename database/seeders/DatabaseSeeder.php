<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ContactLink;
use App\Models\Project;
use App\Models\Setting;
use App\Models\SkillCategory;
use App\Models\SocialLink;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@portfolio.local'],
            ['name' => 'Jordan Lee', 'password' => Hash::make('portfolio123')]
        );

        $settings = [
            'seo_title'       => 'Jordan Lee — Software Engineer · Full-Stack Developer',
            'seo_description' => 'Jordan Lee — Software Engineering student at Northgate University focused on backend logic, API design, and turning requirements into working systems. MERN · MEAN · REST APIs.',
            'seo_domain'      => 'https://YOUR-DOMAIN.com',

            'brand_name'    => 'Portfolio',
            'nav_cta_label' => 'Get in Touch',

            'hero_name'       => 'Jordan Lee',
            'hero_tagline'    => 'Turning *requirements* into working systems.',
            'hero_sub'        => 'Software Engineering student at Northgate University, London — focused on backend logic, API design, and system architecture. Open to internships and project-based roles where I can build dependable, well-structured software.',
            'hero_cta1_label' => 'View My Work',
            'hero_cta1_url'   => '#projects',
            'hero_cta1_style' => 'primary',
            'hero_cta2_label' => 'Get in Touch',
            'hero_cta2_url'   => '#contact',
            'hero_cta2_style' => 'ghost',
            'hero_image'      => 'assets/profile-1.webp',
            'hero_initials'   => 'JL',

            'about_eyebrow'  => 'About',
            'about_title'    => 'I think in *systems*, not just code.',
            'about_p1'       => "I'm a Software Engineering student at Northgate University focused on ==full-stack web development== across the MERN and MEAN stacks. What I enjoy most is the requirement-gathering side of building software — sitting with a problem, ==mapping out the system==, designing the database, and then watching it all connect end-to-end.",
            'about_p2'       => "Outside of code, I'm part of Northgate University's debating society and compete in speed-coding events. I'm open to internships and freelance projects where I can contribute to ==backend systems, API design, or full-stack builds.==",
            'about_image'    => 'assets/profile-2.webp',
            'about_name'     => 'Jordan Lee',
            'about_role'     => 'Software Engineering Student · Full-Stack Developer',
            'about_location' => 'London, UK',

            'projects_eyebrow' => 'Selected Work',
            'projects_title'   => 'Projects',
            'projects_lead'    => 'Four builds, led by the strongest. Each one is framed around architecture and trade-offs — not just the libraries used.',

            'skills_eyebrow' => 'Capabilities',
            'skills_title'   => 'Skills & Stack',
            'skills_lead'    => 'Grouped by where they live in the system — no progress bars, just what I actually build with.',
            'showcase_title' => 'One word, two stacks.',
            'showcase_text'  => 'MongoDB, Express, Angular, React and Node — the building blocks behind every project here. Angular completes the MEAN side; React powers the MERN builds.',

            'beyond_eyebrow' => 'Beyond Code',
            'beyond_title'   => 'Leadership & activities',

            'contact_eyebrow' => 'Contact',
            'contact_title'   => "Let's *build* something.",
            'contact_text'    => 'Currently open to internships, freelance projects, and collaborations. Reach out for opportunities, project inquiries, or just to talk software.',

            'footer_brand'     => 'Jordan Lee',
            'footer_location'  => 'Based in London, UK',
            'footer_copyright' => '© 2026 · All rights reserved',
        ];
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Project::truncate();
        $projects = [
            [
                'title' => 'Blogging Web Application',
                'subtitle' => 'Full-stack content platform with role-based access',
                'chips' => ['MongoDB', 'Express.js', 'React', 'Node.js'],
                'description' => 'A complete blogging platform where users write posts, upload images, and like & comment on content. It implements secure authentication with separate user and admin roles — including an admin dashboard for moderation. Frontend and backend communicate through a custom REST API.',
                'highlights' => [
                    'JWT-based authentication with role-based access control',
                    'Image upload & media handling',
                    'Engagement features — likes & comments',
                    'Admin panel for content moderation',
                ],
                'links' => [
                    ['label' => 'Live Demo', 'url' => '#', 'style' => 'primary'],
                    ['label' => 'GitHub', 'url' => '#', 'style' => 'ghost'],
                ],
                'visual_variant' => 'rose',
            ],
            [
                'title' => 'Student Management System',
                'subtitle' => 'API-driven architecture with separated databases',
                'chips' => ['Node.js', 'Express', 'MongoDB', 'REST APIs'],
                'description' => 'A modular student-management system designed around separation of concerns — students and courses live in independent databases and communicate only through REST APIs. This enforces clean service boundaries and makes the system far easier to scale.',
                'highlights' => [
                    'Database-per-service architecture',
                    'RESTful API design with proper HTTP semantics',
                    'Clean separation between data & business logic',
                    'Built with scalability in mind',
                ],
                'links' => [
                    ['label' => 'GitHub', 'url' => '#', 'style' => 'ghost'],
                ],
                'visual_variant' => 'peach',
            ],
            [
                'title' => 'Inventory Management System',
                'subtitle' => 'Relational database design for retail operations',
                'chips' => ['MySQL', 'SQL'],
                'description' => 'A relational database system for managing product inventory — handling stock tracking, unique product identification, and transactional integrity for sales and purchases. Designed with a normalized schema, foreign-key constraints, and careful transaction handling.',
                'highlights' => [
                    'Normalized relational schema',
                    'Atomic transaction handling for sales / purchases',
                    'Stock reconciliation logic',
                    'Foreign-key constraints for data integrity',
                ],
                'links' => [
                    ['label' => 'GitHub', 'url' => '#', 'style' => 'ghost'],
                ],
                'visual_variant' => 'cream',
            ],
            [
                'title' => 'TaskFlow — Team Task Manager',
                'subtitle' => 'Real-time Kanban workspaces with role-based teams',
                'chips' => ['MongoDB', 'Express', 'Angular', 'Node.js'],
                'description' => 'A collaborative task manager built end-to-end on the MEAN stack. Teams organise work into boards and columns, assign tasks, and track progress in real time. Angular reactive forms and RxJS drive a responsive drag-and-drop interface, while a Node/Express REST API persists state to MongoDB.',
                'highlights' => [
                    'Drag-and-drop Kanban backed by RxJS state streams',
                    'JWT auth with workspace-level roles & route guards',
                    'Live updates over WebSockets across team members',
                    'Angular reactive forms with schema-validated APIs',
                ],
                'links' => [
                    ['label' => 'Live Demo', 'url' => '#', 'style' => 'primary'],
                    ['label' => 'GitHub', 'url' => '#', 'style' => 'ghost'],
                ],
                'visual_variant' => 'mauve',
            ],
        ];
        foreach ($projects as $i => $p) {
            Project::create($p + ['sort' => $i]);
        }

        Stat::truncate();
        $stats = [
            ['number' => '10', 'suffix' => '+', 'label' => 'Technologies across the full stack'],
            ['number' => '2', 'suffix' => 'stacks', 'label' => 'MERN & MEAN full-stack'],
            ['number' => '4', 'suffix' => '+', 'label' => 'Shipped engineering projects'],
            ['number' => '600', 'suffix' => '+', 'label' => 'Peers reached at campus tech events'],
        ];
        foreach ($stats as $i => $s) {
            Stat::create($s + ['sort' => $i]);
        }

        SkillCategory::truncate();
        $skills = [
            ['name' => 'Frontend', 'items' => ['React.js', 'Angular', 'JavaScript', 'HTML5', 'CSS3']],
            ['name' => 'Backend', 'items' => ['Node.js', 'Express.js', 'REST APIs']],
            ['name' => 'Databases', 'items' => ['MongoDB', 'MySQL']],
            ['name' => 'Concepts & Tools', 'items' => ['Full-Stack Development', 'RESTful API Design', 'Requirement Analysis', 'System Design', 'Git & GitHub']],
        ];
        foreach ($skills as $i => $s) {
            SkillCategory::create($s + ['sort' => $i]);
        }

        Activity::truncate();
        $activities = [
            [
                'date_label' => 'February 2025',
                'title' => 'Parliamentary Debate Championship — Organizing Team',
                'org' => 'the University Debating Society',
                'description' => "Helped organise Northgate University's Parliamentary Debate Championship — a 200+ participant inter-university event. Managed scheduling, team coordination, and on-ground logistics across multiple rounds.",
            ],
            [
                'date_label' => 'May 2025',
                'title' => "Campus Tech Festival 2025 — Speed Coding",
                'org' => 'Northgate University',
                'description' => "Competed in the speed-coding module at Northgate University's 400+ participant tech festival, solving algorithmic challenges under timed conditions.",
            ],
        ];
        foreach ($activities as $i => $a) {
            Activity::create($a + ['sort' => $i]);
        }

        ContactLink::truncate();
        $contacts = [
            ['type' => 'email', 'label' => 'Email', 'value' => 'jordan.lee@example.com', 'url' => 'mailto:jordan.lee@example.com'],
            ['type' => 'phone', 'label' => 'Phone', 'value' => '+1 555 010 0142', 'url' => 'tel:+15550100142'],
            ['type' => 'linkedin', 'label' => 'LinkedIn', 'value' => 'Connect on LinkedIn', 'url' => '#'],
            ['type' => 'github', 'label' => 'GitHub', 'value' => 'View my repositories', 'url' => '#'],
        ];
        foreach ($contacts as $i => $c) {
            ContactLink::create($c + ['sort' => $i]);
        }

        SocialLink::truncate();
        $socials = [
            ['platform' => 'email', 'url' => 'mailto:jordan.lee@example.com'],
            ['platform' => 'linkedin', 'url' => '#'],
            ['platform' => 'github', 'url' => '#'],
        ];
        foreach ($socials as $i => $s) {
            SocialLink::create($s + ['sort' => $i]);
        }
    }
}
