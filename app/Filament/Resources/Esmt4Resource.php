<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Esmt4;
use App\Models\Student;
use Filament\Forms\Form;
use App\Models\Classroom;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Esmt4Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Esmt4Resource\RelationManagers;

class Esmt4Resource extends Resource
{
    protected static ?string $model = Esmt4::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Nilai Eskul Semester 4';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('student_id')
                            ->options(Student::all()->pluck('name', 'id'))
                            ->label('Murid'),
                        Select::make('classroom_id')
                            ->options(Classroom::all()->pluck('name', 'id'))
                            ->label('Kelas'),
                        TextInput::make('pramuka')
                            ->label('Pramuka')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('kesenian')
                            ->label('Kesenian')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('pramadan')
                            ->label('Pesantren Ramadhan')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('okesehatan')
                            ->label('Olahraga & Kesehatan')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('kmulia')
                            ->label('Keagamaan & Akhlak Mulia')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('bkerja')
                            ->label('Budaya Kerja')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('kewirausahaan')
                            ->label('Kewirausaan')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('berekayasa')
                            ->label('Berekayasa & Berteknologi')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('kebekerjaan')
                            ->label('Keberkerjaan')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('sakit')
                            ->label('Sakit')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('izin')
                            ->label('Izin')
                            ->numeric()
                            ->rules('max:100'),
                        TextInput::make('Alfa')
                            ->label('Alfa')
                            ->numeric()
                            ->rules('max:100'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('Murid'),
                TextColumn::make('classroom.name')
                    ->label('Kelas'),
                TextColumn::make('pramuka')
                    ->label('Pramuka'),
                TextColumn::make('kesenian')
                    ->label('Kesenian'),
                TextColumn::make('pramadan')
                    ->label('Pesantren Ramadhan'),
                TextColumn::make('okesehatan')
                    ->label('Olahraga & Kesehatan'),
                TextColumn::make('kmulia')
                    ->label('Keagamaan & Akhlak Mulia'),
                TextColumn::make('bkerja')
                    ->label('Budaya Kerja'),
                TextColumn::make('kewirausahaan')
                    ->label('Kewirausaan'),
                TextColumn::make('berekayasa')
                    ->label('Berekayasa & Berteknologi'),
                TextColumn::make('kebekerjaan')
                    ->label('Keberkerjaan'),
                TextColumn::make('sakit')
                    ->label('Sakit'),
                TextColumn::make('izin')
                    ->label('Izin'),
                TextColumn::make('alfa')
                    ->label('Alfa'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('classroom_id')
                    ->options(Classroom::all()->pluck('name', 'id'))
                    ->label('Filter Kelas'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEsmt4s::route('/'),
            'create' => Pages\CreateEsmt4::route('/create'),
            'edit' => Pages\EditEsmt4::route('/{record}/edit'),
        ];
    }

    public  static function getLabel(): ?string
    {
        $locale = app()->getLocale();

        if ($locale == 'id') {
            return "Nilai Ledger D Eskul,p5k,Presensi Semester 4";
        } else
            return "Teacher";
    }
}
