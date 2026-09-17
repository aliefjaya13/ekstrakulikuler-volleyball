<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Evaluation;
use App\Models\Ranking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@voli.com'],
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '081234567890',
                'status' => 'active',
            ]
        );

        $coach = User::firstOrCreate(
            ['email' => 'coach@voli.com'],
            [
                'name' => 'Pelatih Voli',
                'password' => Hash::make('password123'),
                'role' => 'coach',
                'phone' => '081234567891',
                'status' => 'active',
            ]
        );

        $memberEmails = [
            'member@voli.com' => 'Peserta Voli',
            'member1@voli.com' => 'Alya Putri',
            'member2@voli.com' => 'Bima Saputra',
            'member3@voli.com' => 'Citra Nabila',
            'member4@voli.com' => 'Doni Pratama',
        ];

        $memberUsers = collect();
        foreach ($memberEmails as $email => $name) {
            $memberUsers->push(
                User::firstOrCreate(
                    ['email' => $email],
                    [
                        'name' => $name,
                        'password' => Hash::make('password123'),
                        'role' => 'member',
                        'phone' => '08123456789' . (strlen($email) % 10),
                        'status' => 'active',
                    ]
                )
            );
        }

        $schedule = Schedule::firstOrCreate(
            ['title' => 'Latihan Teknik Servis dan Passing', 'schedule_date' => now()->toDateString()],
            [
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'location' => 'Lapangan Voli Universitas',
                'notes' => 'Latihan fokus pada servis, passing atas, dan formasi bertahan.',
                'created_by' => $admin->id,
                'is_active' => true,
            ]
        );

        $memberUsers->each(function ($member, $index) use ($schedule, $coach) {
            $attendanceStatus = ['present', 'late', 'present', 'excused', 'present'][$index % 5];

            Attendance::updateOrCreate(
                [
                    'schedule_id' => $schedule->id,
                    'user_id' => $member->id,
                ],
                [
                    'attendance_status' => $attendanceStatus,
                    'checked_in_at' => now()->subHours(2 - $index),
                    'notes' => $attendanceStatus === 'late' ? 'Datang terlambat 10 menit.' : null,
                    'confirmed_by' => $coach->id,
                ]
            );

            $scoreBase = [92, 88, 84, 79, 86];
            $performance = [90, 86, 82, 81, 88];
            $discipline = [95, 90, 88, 85, 89];
            $total = $scoreBase[$index] + $performance[$index] + $discipline[$index];

            Evaluation::updateOrCreate(
                [
                    'schedule_id' => $schedule->id,
                    'user_id' => $member->id,
                ],
                [
                    'evaluator_id' => $coach->id,
                    'attendance_score' => $scoreBase[$index],
                    'performance_score' => $performance[$index],
                    'discipline_score' => $discipline[$index],
                    'total_score' => $total,
                    'notes' => 'Performa cukup konsisten pada sesi latihan ini.',
                ]
            );

            Ranking::updateOrCreate(
                [
                    'user_id' => $member->id,
                    'period_month' => now()->format('Y-m'),
                ],
                [
                    'total_score' => $total,
                    'rank_position' => $index + 1,
                ]
            );
        });
    }
}
