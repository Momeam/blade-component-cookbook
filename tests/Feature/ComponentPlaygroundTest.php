<?php

namespace Tests\Feature;

use App\Livewire\ComponentPlayground;
use Livewire\Livewire;
use Tests\TestCase;

class ComponentPlaygroundTest extends TestCase
{
    public function test_the_playground_displays_course_components(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('พื้นที่ฝึกทำตามคอร์ส')
            ->assertSee('Inline editing')
            ->assertSee('Toast notifications')
            ->assertSee('Kanban board');
    }

    public function test_a_lesson_can_be_selected_from_the_playground(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->call('selectTopic', 'tags')
            ->assertSet('activeTopic', 'tags')
            ->assertSee('พิมพ์แล้วกด Enter');
    }

    public function test_the_inline_editor_saves_and_cancels_changes(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->call('startEditing')
            ->set('note', 'A thoughtful detail')
            ->call('saveNote')
            ->assertSet('savedNote', 'A thoughtful detail')
            ->assertDispatched('component-saved')
            ->call('startEditing')
            ->set('note', 'Discard this')
            ->call('cancelEditing')
            ->assertSet('note', 'A thoughtful detail');
    }

    public function test_search_filters_the_component_list(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->set('activeTopic', 'search')
            ->set('search', 'Kanban')
            ->assertSee('Kanban board')
            ->assertDontSee('Inline editing');
    }

    public function test_tags_can_be_added_removed_and_cannot_be_duplicated(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->set('activeTopic', 'tags')
            ->set('tagInput', 'Tailwind')
            ->call('addTag')
            ->assertSee('Tailwind')
            ->assertSet('tagInput', '')
            ->set('tagInput', 'tailwind')
            ->call('addTag')
            ->assertHasErrors('tagInput')
            ->call('removeTag', 3)
            ->assertDontSee('Tailwind');
    }

    public function test_multi_step_flow_validates_and_completes(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->set('activeTopic', 'multi-step')
            ->call('nextFlowStep')
            ->assertHasErrors('flowName')
            ->set('flowName', 'Mali')
            ->call('nextFlowStep')
            ->assertSet('flowStep', 2)
            ->set('flowEmail', 'not-an-email')
            ->call('nextFlowStep')
            ->assertHasErrors('flowEmail')
            ->set('flowEmail', 'mali@example.com')
            ->call('nextFlowStep')
            ->assertSet('flowComplete', true)
            ->assertSet('flowStep', 3);
    }

    public function test_notifications_and_kanban_tasks_can_be_updated(): void
    {
        Livewire::test(ComponentPlayground::class)
            ->set('activeTopic', 'notifications')
            ->call('markAllNotificationsRead')
            ->assertSee('0 รายการที่ยังไม่อ่าน')
            ->call('dismissNotification', 0)
            ->assertCount('notifications', 2)
            ->call('moveTask', 1, 'done')
            ->assertSet('tasks.0.column', 'done');
    }
}
