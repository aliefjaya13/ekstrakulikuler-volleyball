<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_member_can_submit_manual_attendance(): void
    {
        $member = \App\Models\User::factory()->create([
            'role' => 'member',
            'email' => 'member.attendance@example.com',
        ]);

        $schedule = \App\Models\Schedule::create([
            'title' => 'Latihan Teknik Servis',
            'schedule_date' => '2026-09-20',
            'start_time' => '15:00:00',
            'end_time' => '17:00:00',
            'location' => 'Lapangan Sekolah',
            'notes' => 'Latihan rutin',
            'created_by' => $member->id,
            'is_active' => true,
        ]);

        $response = $this->actingAs($member)->post('/member/attendance', [
            'schedule_id' => $schedule->id,
            'attendance_status' => 'present',
            'notes' => 'Saya hadir tepat waktu.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('attendances', [
            'user_id' => $member->id,
            'schedule_id' => $schedule->id,
            'attendance_status' => 'present',
        ]);
    }
}
