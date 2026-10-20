<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ComponentPlayground extends Component
{
    public string $activeTopic = 'inline-editing';

    public string $search = '';

    public string $note = 'คลิกเพื่อแก้ไขข้อความนี้';

    public string $savedNote = 'คลิกเพื่อแก้ไขข้อความนี้';

    public bool $editing = false;

    public int $flowStep = 1;

    public string $flowName = '';

    public string $flowEmail = '';

    public bool $flowComplete = false;

    public array $tags = ['Livewire', 'Alpine.js', 'Blade'];

    public string $tagInput = '';

    public array $notifications = [
        ['title' => 'บันทึกการเปลี่ยนแปลงแล้ว', 'detail' => 'Project settings · เมื่อสักครู่', 'read' => false],
        ['title' => 'มีสมาชิกใหม่ในทีม', 'detail' => 'Nicha เข้าร่วม Workspace · 12 นาทีที่แล้ว', 'read' => false],
        ['title' => 'งานใกล้ถึงกำหนด', 'detail' => 'Polish component states · 1 ชั่วโมงที่แล้ว', 'read' => true],
    ];

    public array $tasks = [
        ['id' => 1, 'title' => 'ออกแบบ empty state', 'column' => 'todo'],
        ['id' => 2, 'title' => 'ทำ tag input', 'column' => 'todo'],
        ['id' => 3, 'title' => 'เช็ก keyboard navigation', 'column' => 'progress'],
        ['id' => 4, 'title' => 'จัดระยะ toast', 'column' => 'done'],
    ];

    private const TOPICS = [
        ['id' => 'inline-editing', 'title' => 'Inline editing', 'description' => 'แก้ไขข้อความในหน้า พร้อมบันทึกหรือยกเลิก', 'icon' => 'Aa', 'color' => 'peach', 'part' => '01'],
        ['id' => 'toast', 'title' => 'Toast notifications', 'description' => 'แสดง feedback สั้น ๆ หลังทำรายการ', 'icon' => '✳', 'color' => 'mint', 'part' => '02'],
        ['id' => 'multi-step', 'title' => 'Multi-step flows', 'description' => 'แบ่งฟอร์มเป็นขั้น พร้อมตรวจสอบข้อมูล', 'icon' => '01', 'color' => 'lilac', 'part' => '03'],
        ['id' => 'tags', 'title' => 'Tag inputs', 'description' => 'เพิ่มและลบแท็กด้วยคีย์บอร์ด', 'icon' => '#', 'color' => 'yellow', 'part' => '04'],
        ['id' => 'search', 'title' => 'Dynamic search', 'description' => 'กรองรายการระหว่างพิมพ์', 'icon' => '⌕', 'color' => 'blue', 'part' => '05'],
        ['id' => 'notifications', 'title' => 'Notifications', 'description' => 'จัดการรายการแจ้งเตือนและสถานะอ่านแล้ว', 'icon' => '◉', 'color' => 'pink', 'part' => '06'],
        ['id' => 'kanban', 'title' => 'Kanban board', 'description' => 'จัดการและย้ายงานระหว่างคอลัมน์', 'icon' => '↗', 'color' => 'green', 'part' => '07'],
    ];

    public function selectTopic(string $topic): void
    {
        if (collect(self::TOPICS)->doesntContain('id', $topic)) {
            abort(404);
        }

        $this->activeTopic = $topic;
        $this->resetValidation();
    }

    public function startEditing(): void
    {
        $this->editing = true;
    }

    public function cancelEditing(): void
    {
        $this->note = $this->savedNote;
        $this->editing = false;
    }

    public function saveNote(): void
    {
        $this->savedNote = trim($this->note) ?: 'คลิกเพื่อแก้ไขข้อความนี้';
        $this->note = $this->savedNote;
        $this->editing = false;
        $this->dispatch('component-saved');
    }

    public function showToast(): void
    {
        $this->dispatch('show-toast', message: 'บันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว');
    }

    public function nextFlowStep(): void
    {
        if ($this->flowStep === 1) {
            $this->validate(['flowName' => ['required', 'string', 'max:80']]);
            $this->flowStep = 2;

            return;
        }

        if ($this->flowStep === 2) {
            $this->validate(['flowEmail' => ['required', 'email', 'max:255']]);
            $this->flowStep = 3;
            $this->flowComplete = true;
        }
    }

    public function previousFlowStep(): void
    {
        $this->resetValidation();
        $this->flowStep = max(1, $this->flowStep - 1);
        $this->flowComplete = false;
    }

    public function resetFlow(): void
    {
        $this->reset('flowStep', 'flowName', 'flowEmail', 'flowComplete');
        $this->resetValidation();
    }

    public function addTag(): void
    {
        $tag = trim($this->tagInput);

        if ($tag === '' || count($this->tags) >= 8) {
            return;
        }

        if (collect($this->tags)->contains(fn (string $existing) => mb_strtolower($existing) === mb_strtolower($tag))) {
            $this->addError('tagInput', 'มีแท็กนี้แล้ว');

            return;
        }

        $this->tags[] = $tag;
        $this->tagInput = '';
        $this->resetValidation('tagInput');
    }

    public function removeTag(int $index): void
    {
        if (isset($this->tags[$index])) {
            unset($this->tags[$index]);
            $this->tags = array_values($this->tags);
        }
    }

    public function markAllNotificationsRead(): void
    {
        $this->notifications = array_map(
            fn (array $notification) => [...$notification, 'read' => true],
            $this->notifications,
        );
    }

    public function dismissNotification(int $index): void
    {
        if (isset($this->notifications[$index])) {
            unset($this->notifications[$index]);
            $this->notifications = array_values($this->notifications);
        }
    }

    public function moveTask(int $taskId, string $column): void
    {
        if (! in_array($column, ['todo', 'progress', 'done'], true)) {
            abort(422);
        }

        foreach ($this->tasks as $index => $task) {
            if ($task['id'] === $taskId) {
                $this->tasks[$index]['column'] = $column;

                return;
            }
        }

        abort(404);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $query = mb_strtolower(trim($this->search));
        $topics = collect(self::TOPICS)
            ->filter(fn (array $topic) => $query === '' || str_contains(
                mb_strtolower($topic['title'].' '.$topic['description']),
                $query,
            ))
            ->values();

        return view('livewire.component-playground', [
            'topics' => $topics,
            'active' => collect(self::TOPICS)->firstWhere('id', $this->activeTopic),
            'unreadCount' => collect($this->notifications)->where('read', false)->count(),
        ]);
    }
}
