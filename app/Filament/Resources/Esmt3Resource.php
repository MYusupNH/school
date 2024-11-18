<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Esmt3;
use App\Models\Student;
use Filament\Forms\Form;
use App\Models\Classroom;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Esmt3Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Esmt3Resource\RelationManagers;

class Esmt3Resource extends Resource
{
    protected static ?string $model = Esmt3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                        TextInput::make('pramuka'),
                        TextInput::make('kesenian'),
                        TextInput::make('pramadan'),
                        TextInput::make('okesehatan'),
                        TextInput::make('kmulia'),
                        TextInput::make('bkerja'),
                        TextInput::make('kewirausahaan'),
                        TextInput::make('berekayasa'),
                       TextInput::make('kebekerjaan'),
                        //TextInput::make('gim'),
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
            TextColumn::make('pramuka'),
            TextColumn::make('kesenian'),
            TextColumn::make('pramadan'),
            TextColumn::make('okesehatan'),
            TextColumn::make('kmulia'),
            TextColumn::make('bkerja'),
            TextColumn::make('kewirausahaan'),
            TextColumn::make('berekayasa'),
            TextColumn::make('kebekerjaan'),
            //TextColumn::make('gim'),
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
            'index' => Pages\ListEsmt3s::route('/'),
            'create' => Pages\CreateEsmt3::route('/create'),
            'edit' => Pages\EditEsmt3::route('/{record}/edit'),
        ];
    }
}
