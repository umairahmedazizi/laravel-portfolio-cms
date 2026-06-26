<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Artisan;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $title = 'Site content & settings';

    protected static ?int $navigationSort = -10;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Setting::map());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()->columnSpanFull()->tabs([
                    Tab::make('Hero')->schema([
                        TextInput::make('hero_name')->required(),
                        TextInput::make('hero_initials')->label('Monogram initials')->helperText('Shown if the photo fails to load, e.g. ES'),
                        TextInput::make('hero_tagline')->columnSpanFull()
                            ->helperText('Wrap the highlighted word in *asterisks*, e.g. Turning *requirements* into working systems.'),
                        Textarea::make('hero_sub')->label('Intro paragraph')->rows(3)->columnSpanFull(),
                        TextInput::make('hero_image')->label('Hero photo path')->helperText('Relative to the site root, e.g. assets/profile-1.webp'),
                        TextInput::make('brand_name')->label('Nav brand text'),
                        TextInput::make('nav_cta_label')->label('Nav button label'),
                        TextInput::make('hero_cta1_label')->label('Button 1 label'),
                        TextInput::make('hero_cta1_url')->label('Button 1 link'),
                        Select::make('hero_cta1_style')->label('Button 1 style')->options(['primary' => 'Primary', 'ghost' => 'Ghost']),
                        TextInput::make('hero_cta2_label')->label('Button 2 label'),
                        TextInput::make('hero_cta2_url')->label('Button 2 link'),
                        Select::make('hero_cta2_style')->label('Button 2 style')->options(['primary' => 'Primary', 'ghost' => 'Ghost']),
                    ])->columns(2),

                    Tab::make('About')->schema([
                        TextInput::make('about_eyebrow'),
                        TextInput::make('about_title')->columnSpanFull()
                            ->helperText('Wrap the emphasised word in *asterisks*.'),
                        Textarea::make('about_p1')->label('Paragraph 1')->rows(4)->columnSpanFull()
                            ->helperText('Wrap highlighted phrases in ==double equals==.'),
                        Textarea::make('about_p2')->label('Paragraph 2')->rows(4)->columnSpanFull()
                            ->helperText('Wrap highlighted phrases in ==double equals==.'),
                        TextInput::make('about_image')->label('About photo path')->helperText('e.g. assets/profile-2.webp'),
                        TextInput::make('about_name'),
                        TextInput::make('about_role'),
                        TextInput::make('about_location'),
                    ])->columns(2),

                    Tab::make('Sections')->schema([
                        TextInput::make('projects_eyebrow'),
                        TextInput::make('projects_title'),
                        Textarea::make('projects_lead')->rows(2)->columnSpanFull(),
                        TextInput::make('skills_eyebrow'),
                        TextInput::make('skills_title'),
                        Textarea::make('skills_lead')->rows(2)->columnSpanFull(),
                        TextInput::make('showcase_title')->label('Stack showcase title'),
                        Textarea::make('showcase_text')->label('Stack showcase text')->rows(3)->columnSpanFull(),
                        TextInput::make('beyond_eyebrow'),
                        TextInput::make('beyond_title'),
                    ])->columns(2),

                    Tab::make('Contact & footer')->schema([
                        TextInput::make('contact_eyebrow'),
                        TextInput::make('contact_title')->columnSpanFull()
                            ->helperText('Wrap the emphasised word in *asterisks*.'),
                        Textarea::make('contact_text')->rows(3)->columnSpanFull(),
                        TextInput::make('footer_brand'),
                        TextInput::make('footer_location'),
                        TextInput::make('footer_copyright'),
                    ])->columns(2),

                    Tab::make('SEO')->schema([
                        TextInput::make('seo_title')->label('Page title')->columnSpanFull(),
                        Textarea::make('seo_description')->label('Meta description')->rows(3)->columnSpanFull(),
                        TextInput::make('seo_domain')->label('Live domain')->columnSpanFull()
                            ->helperText('Full URL, e.g. https://jordanlee.dev — used for canonical, Open Graph and sitemap.'),
                    ])->columns(2),
                ]),
            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->action('save'),
            Action::make('publish')
                ->label('Publish to site')
                ->icon(Heroicon::OutlinedRocketLaunch)
                ->color('success')
                ->requiresConfirmation()
                ->modalDescription('This saves your changes and regenerates the static index.html in the site folder.')
                ->action('publish'),
        ];
    }

    public function save(): void
    {
        foreach ($this->form->getState() as $key => $value) {
            Setting::put($key, $value);
        }

        Notification::make()->title('Settings saved')->success()->send();
    }

    public function publish(): void
    {
        $this->save();

        $code = Artisan::call('site:publish');
        $output = trim(Artisan::output());

        Notification::make()
            ->title($code === 0 ? 'Published to site' : 'Publish failed')
            ->body($output)
            ->status($code === 0 ? 'success' : 'danger')
            ->send();
    }
}
