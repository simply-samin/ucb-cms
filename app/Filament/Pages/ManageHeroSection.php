<?php

namespace App\Filament\Pages;

use App\Models\HeroSection;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageHeroSection extends Page
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPhoto;
    protected static ?string $navigationLabel = 'Hero Section';
    protected static string | UnitEnum | null $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-hero-section';

    /**
     * The Livewire form state.
     *
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    TextInput::make('title')
                        ->required()
                        ->label('Main Title')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Select::make('background_type')
                        ->label('Background Type')
                        ->options([
                            'image' => 'Image',
                            'video' => 'Video',
                        ])
                        ->default('image')
                        ->required()
                        ->native(false),

                    FileUpload::make('background_media')
                        ->label('Background Media')
                        ->directory('hero')
                        ->disk('public')                   
                        ->visibility('public')
                        ->imageEditor()
                        ->imagePreviewHeight('200')        
                        ->openable()                       
                        ->downloadable(),                  

                    TextInput::make('cta_label')
                        ->label('CTA Button Label')
                        ->maxLength(255),

                    TextInput::make('cta_link')
                        ->label('CTA Link')
                        ->placeholder('https:// or relative path')
                        ->maxLength(255),

                    Select::make('text_alignment')
                        ->label('Text Alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->required()
                        ->native(false),
                ])
                    ->columns(2)
                    ->livewireSubmitHandler('save')
                    ->footer([
                        SchemaActions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (! $record) {
            $record = new HeroSection();
        }

        // Handle replacing existing background media
        if (
            isset($data['background_media'])
            && $record->background_media
            && $data['background_media'] !== $record->background_media
        ) {
            // Make sure we're using the same disk as FileUpload
            $disk = Storage::disk('public');

            if ($disk->exists($record->background_media)) {
                $disk->delete($record->background_media);
            }
        }

        if (empty($data['background_media']) && $record->background_media) {
            Storage::disk('public')->delete($record->background_media);
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Hero section saved successfully!')
            ->send();
    }

    public function getRecord(): ?HeroSection
    {
        return HeroSection::query()->first();
    }


}
