<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dsmt5;
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
use App\Filament\Resources\Dsmt5Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Dsmt5Resource\RelationManagers;

class Dsmt5Resource extends Resource
{
    protected static ?string $model = Dsmt5::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Nilai Disiplin Semester 5';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextColumn::make('student.name')
                    ->label('Murid'),
                TextColumn::make('classroom.name')
                    ->label('Kelas'),
                TextColumn::make('dwaktu')
                    ->label('Disiplin Waktu')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dibadah')
                    ->label('Disiplin Ibadah')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dbelajar')
                    ->label('Disiplin Belajar')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dbergaul')
                    ->label('Disiplin Bergaul')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dberbusana')
                    ->label('Disiplin Berbusana')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dmenggunakanfasilitas')
                    ->label('Disiplin Menggunakan Fasilitas')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dk3')
                    ->label('dk3')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dberbahasa')
                    ->label('Disiplin Berbahasa')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dbertindak')
                    ->label('Bertindak & Menindak')
                    ->numeric()
                    ->rules('max:100'),
                TextColumn::make('dkeamanan')
                    ->label('Disiplin Keamanan')
                    ->numeric()
                    ->rules('max:100'),
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
                TextColumn::make('dwaktu')
                    ->label('Disiplin Waktu'),
                TextColumn::make('dibadah')
                    ->label('Disiplin Ibadah'),
                TextColumn::make('dbelajar')
                    ->label('Disiplin Belajar'),
                TextColumn::make('dbergaul')
                    ->label('Disiplin Bergaul'),
                TextColumn::make('dberbusana')
                    ->label('Disiplin Berbusana'),
                TextColumn::make('dmenggunakanfasilitas')
                    ->label('Disiplin Menggunakan Fasilitas'),
                TextColumn::make('dk3')
                    ->label('dk3'),
                TextColumn::make('dberbahasa')
                    ->label('Disiplin Berbahasa'),
                TextColumn::make('dbertindak')
                    ->label('Bertindak & Menindak'),
                TextColumn::make('dkeamanan')
                    ->label('Disiplin Keamanan'),
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
            'index' => Pages\ListDsmt5s::route('/'),
            'create' => Pages\CreateDsmt5::route('/create'),
            'edit' => Pages\EditDsmt5::route('/{record}/edit'),
        ];
    }

    public  static function getLabel(): ?string
    {
        $locale = app()->getLocale();

        if ($locale == 'id') {
            return "Nilai 10 Disiplin Semester 5";
        } else
            return "Teacher";
    }
}
