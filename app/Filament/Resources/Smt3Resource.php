<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Smt3;
use Filament\Tables;
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
use App\Filament\Resources\Smt3Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Smt3Resource\RelationManagers;

class Smt3Resource extends Resource
{
    protected static ?string $model = Smt3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Semester 3';

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
                    TextInput::make('pai')
                        ->label('Pendidikan Agama Islam'),
                    TextInput::make('pp')
                        ->label('Pendidikan Pancasila'),
                    TextInput::make('indo')
                        ->label('Bahasa Indonesia'),
                    TextInput::make('pjok')
                        ->label('Pendidikan Jasmani Olahraga dan Kesehatan'),
                    TextInput::make('sejarah')
                        ->label('Sejarah'),
                    TextInput::make('sb')
                        ->label('Seni Budaya'),
                    TextInput::make('sunda')
                        ->label('Bahasa Sunda'),
                    TextInput::make('arab')
                        ->label('Bahasa Arab'),
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
                TextColumn::make('pai'),
                TextColumn::make('pp'),
                TextColumn::make('indo'),
                TextColumn::make('pjok'),
                TextColumn::make('sejarah'),
                TextColumn::make('sb'),
                TextColumn::make('sunda'),
                TextColumn::make('arab'),
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
            'index' => Pages\ListSmt3s::route('/'),
            'create' => Pages\CreateSmt3::route('/create'),
            'edit' => Pages\EditSmt3::route('/{record}/edit'),
        ];
    }
}