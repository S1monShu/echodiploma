<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID:1
        Song::factory()->create([
            'title' => 'Угонщица',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Угонщица.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Угонщица.jpg',
        ]);
        // ID:2
        Song::factory()->create([
            'title' => 'Любимый человек',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-ЛюбимыйЧеловек.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-ЛюбимыйЧеловек.jpg',
        ]);
        // ID:3
        Song::factory()->create([
            'title' => 'Не дружим',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Недружим.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Недружим.jpg',
        ]);
        // ID:4
        Song::factory()->create([
            'title' => 'Москва-Сочи',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/МИЧЕЛЗ-Москва-Сочи.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/МИЧЕЛЗ-Недружим.jpg',
        ]);
        // ID:5
        Song::factory()->create([
            'title' => 'Beverly Hills',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Zivert-Beverly-Hills.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Life.jpg',
        ]);
        // ID:6
        Song::factory()->create([
            'title' => 'Залипательно',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Zivert-Залипательно.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Залипательно.jpg',
        ]);
        // ID:7
        Song::factory()->create([
            'title' => 'Зеленые волны',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Zivert-Зелёныеволны.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Зеленыеволны.jpg',
        ]);
        // ID:8
        Song::factory()->create([
            'title' => 'LIFE',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Zivert-Life.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Zivert-Зеленыеволны.jpg',
        ]);
        // ID:9
        Song::factory()->create([
            'title' => 'Позвони',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Позвони.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Позвони.jpg',
        ]);
        // ID:10
        Song::factory()->create([
            'title' => 'CO2',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-CO2.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-CO2.jpg',
        ]);
        // ID:11
        Song::factory()->create([
            'title' => 'Пятница',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Пятница.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Пятница.jpg',
        ]);
        // ID:12
        Song::factory()->create([
            'title' => 'Беги',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/DJSMASH-Беги.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/DJSMASH-Беги.jpg',
        ]);
        // ID:13
        Song::factory()->create([
            'title' => 'WOAH',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-WOAH.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-WOAH.jpg',
        ]);
        // ID:14
        Song::factory()->create([
            'title' => 'SNEAKY',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-SNEAKY.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-WOAH.jpg',
        ]);
        // ID:15
        Song::factory()->create([
            'title' => 'LIKE IT',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-Like_it.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-Like_it.jpg',
        ]);
        // ID:16
        Song::factory()->create([
            'title' => 'ЯR',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/WYRGEMI-ЯR.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/WYRGEMI-ЯR.jpg',
        ]);
        // ID:17
        Song::factory()->create([
            'title' => 'WAKANDA',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Maga-WAKANDA.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Maga-WAKANDA.jpg',
        ]);
        // ID:18
        Song::factory()->create([
            'title' => 'THOR',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Maga-THOR.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Maga-THOR.jpg',
        ]);
        // ID:19
        Song::factory()->create([
            'title' => 'BATMAN',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Maga-BATMAN.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Maga-BATMAN.jpg',
        ]);
        // ID:20
        Song::factory()->create([
            'title' => 'Notorious',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Maga-Notorious.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Maga-Notorious.jpg',
        ]);
        // ID:21
        Song::factory()->create([
            'title' => 'Relax',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Relax.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Relax.jpg',
        ]);
        // ID:22
        Song::factory()->create([
            'title' => "Don't Be",
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Dont_Be.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Dont_Be.jpg',
        ]);
        // ID:23
        Song::factory()->create([
            'title' => 'Faded',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Junona_Boys-Faded.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Junona_Boys-Faded.jpg',
        ]);
        // ID:24
        Song::factory()->create([
            'title' => 'Blinding Lights',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Blinding_Lights.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg',
        ]);
        // ID:25
        Song::factory()->create([
            'title' => 'Save Your Tears',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Save_Your_Tears.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg',
        ]);
        // ID:26
        Song::factory()->create([
            'title' => 'Starboy',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Weeknd-Starboy.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg',
        ]);
        // ID:27
        Song::factory()->create([
            'title' => 'The Hills',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Weeknd-The_Hills.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Weeknd-Starboy.jpg',
        ]);
        // ID:28
        Song::factory()->create([
            'title' => 'Кукла колдуна',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Кукла_колдуна.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Кукла_колдуна.jpg',
        ]);
        // ID:29
        Song::factory()->create([
            'title' => 'Лесник',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Лесник.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Лесник.jpg',
        ]);
        // ID:30
        Song::factory()->create([
            'title' => 'Ром',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Ром.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Ром.jpg',
        ]);
        // ID:31
        Song::factory()->create([
            'title' => 'Джокер',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Король_и_Шут-Джокер.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Король_и_Шут-Ром.jpg',
        ]);
        // ID:32
        Song::factory()->create([
            'title' => 'Wicked Game',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Wicked_Game.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Wicked_Game.jpg',
        ]);
        // ID:33
        Song::factory()->create([
            'title' => 'Falling in Love',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Falling_in_Love.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Falling_in_Love.jpg',
        ]);
        // ID:34
        Song::factory()->create([
            'title' => 'Life Will Go',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Life_Will_Go.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:35
        Song::factory()->create([
            'title' => 'Always Got Tonight',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Always_Got_Tonight.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:36
        Song::factory()->create([
            'title' => 'Nothing To Say',
            'is_application' => false,
            'agree_application' => true,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:37
        Song::factory()->create([
            'title' => 'May be',
            'is_application' => true,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:38
        Song::factory()->create([
            'title' => 'Stay with me',
            'is_application' => true,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:39
        Song::factory()->create([
            'title' => 'ANSWER',
            'is_application' => true,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:40
        Song::factory()->create([
            'title' => 'NEW ASK',
            'is_application' => true,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:41
        Song::factory()->create([
            'title' => 'Go to..',
            'is_application' => true,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:42
        Song::factory()->create([
            'title' => 'New music',
            'is_application' => false,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:43
        Song::factory()->create([
            'title' => 'Test Song',
            'is_application' => false,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:44
        Song::factory()->create([
            'title' => 'Creating this',
            'is_application' => false,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
        // ID:45
        Song::factory()->create([
            'title' => 'And go.',
            'is_application' => false,
            'agree_application' => false,
            'popularity' => rand(0, 100),
            'song_url' => 'http://127.0.0.1:8000/storage/songs/source/Chris_Isaak-Nothing_To_Say.mp3',
            'image' => 'http://127.0.0.1:8000/storage/songs/avatars/Chris_Isaak-Life_Will_Go.jpg',
        ]);
    }
}
