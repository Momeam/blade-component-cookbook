<main class="playground-app" x-data="{ toast: '', toastTimer: null }" @@show-toast.window="toast = $event.detail.message; clearTimeout(toastTimer); toastTimer = setTimeout(() => toast = '', 2800)" @@component-saved.window="toast = 'บันทึกข้อความแล้ว'; clearTimeout(toastTimer); toastTimer = setTimeout(() => toast = '', 2800)">
    <aside class="sidebar">
        <a class="brand" href="{{ route('home') }}">
            <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span></span>
            <span>component<span class="brand-dot">/</span>cookbook</span>
        </a>

        <div class="course-label">พื้นที่ฝึกทำตามคอร์ส</div>
        <div class="sidebar-search">
            <span aria-hidden="true">⌕</span>
            <label class="sr-only" for="topic-search">ค้นหาหัวข้อ</label>
            <input id="topic-search" type="search" wire:model.live.debounce.250ms="search" placeholder="ค้นหาหัวข้อ...">
            <kbd>/</kbd>
        </div>

        <nav class="lesson-nav" aria-label="ตัวอย่าง components">
            <span class="nav-heading">COMPONENTS <span>{{ str_pad($topics->count(), 2, '0', STR_PAD_LEFT) }}</span></span>
            @forelse ($topics as $topic)
                <button
                    class="lesson-link {{ $activeTopic === $topic['id'] ? 'is-active' : '' }}"
                    type="button"
                    wire:click="selectTopic('{{ $topic['id'] }}')"
                    @if ($activeTopic === $topic['id']) aria-current="page" @endif
                >
                    <x-ui.lesson-icon :topic="$topic" />
                    <span class="lesson-link-copy"><strong>{{ $topic['title'] }}</strong><small>{{ $topic['description'] }}</small></span>
                    <span class="lesson-part">{{ $topic['part'] }}</span>
                </button>
            @empty
                <div class="nav-empty">ไม่พบหัวข้อที่ค้นหา</div>
            @endforelse
        </nav>

        <div class="sidebar-bottom">
            <div class="stack-heading">YOUR TOOLKIT</div>
            <div class="toolkit-line"><span class="toolkit-mark toolkit-laravel">L</span> Laravel <span class="toolkit-status">พร้อมใช้</span></div>
            <div class="toolkit-line"><span class="toolkit-mark toolkit-livewire">W</span> Livewire <span class="toolkit-status">พร้อมใช้</span></div>
            <div class="toolkit-line"><span class="toolkit-mark toolkit-alpine">A</span> Alpine.js <span class="toolkit-status">พร้อมใช้</span></div>
            <div class="sidebar-note"><span>✳</span> ลองเล่น ปรับแก้ แล้วดูว่าเกิดอะไรขึ้น</div>
        </div>
    </aside>

    <section class="workspace">
        <header class="workspace-header">
            <div class="breadcrumbs"><span>COOKBOOK</span><span class="crumb-slash">/</span><span>{{ strtoupper($active['title']) }}</span></div>
            <div class="header-right"><span class="live-indicator"><i></i> LIVE PREVIEW</span><span class="profile-avatar">ม</span></div>
        </header>

        <div class="lesson-content">
            <div class="lesson-intro">
                <div>
                    <div class="lesson-eyebrow"><span class="eyebrow-line"></span> COMPONENT {{ $active['part'] }} <span class="eyebrow-muted">/ PRACTICE</span></div>
                    <h1>{{ $active['title'] }}</h1>
                    <p>{{ $active['description'] }} ลองปรับและทดสอบตัวอย่างด้านล่างได้เลย</p>
                </div>
                <div class="lesson-badge {{ $active['color'] }}"><span>{{ $active['icon'] }}</span> {{ $active['part'] }} / 07</div>
            </div>

            <div class="practice-grid">
                <section class="demo-panel">
                    <div class="panel-heading">
                        <div><span class="panel-kicker">TRY IT OUT</span><h2>ตัวอย่างที่ลองเล่นได้</h2></div>
                        <span class="panel-live"><i></i> interactive</span>
                    </div>

                    @if ($activeTopic === 'inline-editing')
                        <div class="demo-body inline-demo">
                            <span class="demo-label">PROJECT NOTE</span>
                            @if ($editing)
                                <label class="sr-only" for="project-note">ข้อความ project note</label>
                                <input id="project-note" class="note-input" type="text" wire:model="note" wire:keydown.enter="saveNote" maxlength="120" autofocus>
                                <div class="demo-actions">
                                    <button class="button-primary" type="button" wire:click="saveNote">บันทึก <span>↗</span></button>
                                    <button class="button-quiet" type="button" wire:click="cancelEditing">ยกเลิก</button>
                                </div>
                            @else
                                <button class="editable-note" type="button" wire:click="startEditing" aria-label="แก้ไขข้อความ project note">
                                    <span>{{ $savedNote }}</span><span class="edit-glyph" aria-hidden="true">↗</span>
                                </button>
                                <span class="demo-hint">คลิกข้อความเพื่อแก้ไข · กด Enter เพื่อบันทึก</span>
                            @endif
                            <div class="saved-by"><span class="tiny-avatar">ม</span><span>แก้ไขล่าสุดโดยคุณ</span><span class="saved-status"><i></i> พร้อมบันทึก</span></div>
                        </div>
                    @elseif ($activeTopic === 'toast')
                        <div class="demo-body toast-demo">
                            <div class="toast-example-card">
                                <span class="example-check">✓</span>
                                <span><strong>ตั้งค่าเรียบร้อย</strong><small>พื้นที่ทำงานของคุณอัปเดตแล้ว</small></span>
                                <button type="button" class="dismiss-example" aria-label="ปิดตัวอย่าง">×</button>
                            </div>
                            <button class="button-primary" type="button" wire:click="showToast">จำลองการบันทึก <span>↗</span></button>
                            <span class="demo-hint">กดปุ่มเพื่อดู toast feedback มุมล่างของหน้าจอ</span>
                        </div>
                    @elseif ($activeTopic === 'multi-step')
                        <div class="demo-body flow-demo">
                            <div class="flow-progress" aria-label="ความคืบหน้าของแบบฟอร์ม">
                                @foreach ([1 => 'ชื่อ', 2 => 'อีเมล', 3 => 'เสร็จแล้ว'] as $step => $label)
                                    <div class="flow-progress-step {{ $flowStep >= $step ? 'is-current' : '' }}"><span>{{ $flowStep > $step ? '✓' : $step }}</span><small>{{ $label }}</small></div>
                                @endforeach
                            </div>
                            @if ($flowStep === 1)
                                <label class="field-label" for="flow-name">เริ่มจากชื่อของคุณ</label>
                                <input id="flow-name" class="form-input" type="text" wire:model="flowName" wire:keydown.enter="nextFlowStep" placeholder="เช่น มะลิ">
                                @error('flowName') <span class="field-error">{{ $message }}</span> @enderror
                                <div class="flow-actions"><span class="demo-hint">ขั้นตอน 1 จาก 2</span><button class="button-primary" type="button" wire:click="nextFlowStep">ถัดไป <span>→</span></button></div>
                            @elseif ($flowStep === 2)
                                <label class="field-label" for="flow-email">อีเมลสำหรับติดต่อ</label>
                                <input id="flow-email" class="form-input" type="email" wire:model="flowEmail" wire:keydown.enter="nextFlowStep" placeholder="you@example.com">
                                @error('flowEmail') <span class="field-error">{{ $message }}</span> @enderror
                                <div class="flow-actions"><button class="button-quiet" type="button" wire:click="previousFlowStep">← ย้อนกลับ</button><button class="button-primary" type="button" wire:click="nextFlowStep">เสร็จสิ้น <span>✓</span></button></div>
                            @else
                                <div class="flow-complete"><span>✓</span><strong>เรียบร้อยแล้ว {{ $flowName }}!</strong><p>ข้อมูลของคุณถูกเพิ่มเข้าร่วมพื้นที่ฝึกทำแล้ว</p><button type="button" class="button-quiet" wire:click="resetFlow">เริ่มใหม่</button></div>
                            @endif
                        </div>
                    @elseif ($activeTopic === 'tags')
                        <div class="demo-body tags-demo">
                            <span class="field-label">TECH STACK <span class="field-counter">{{ count($tags) }} / 8</span></span>
                            <div class="tag-input-wrap">
                                @foreach ($tags as $index => $tag)
                                    <span class="tag-chip">{{ $tag }}<button type="button" wire:click="removeTag({{ $index }})" aria-label="ลบแท็ก {{ $tag }}">×</button></span>
                                @endforeach
                                @if (count($tags) < 8)
                                    <label class="sr-only" for="new-tag">เพิ่มแท็ก</label>
                                    <input id="new-tag" class="tag-text-input" type="text" wire:model="tagInput" wire:keydown.enter.prevent="addTag" placeholder="พิมพ์แล้วกด Enter">
                                @endif
                            </div>
                            @error('tagInput') <span class="field-error">{{ $message }}</span> @enderror
                            <span class="demo-hint">กด Enter เพื่อเพิ่ม · คลิก × เพื่อลบ</span>
                        </div>
                    @elseif ($activeTopic === 'search')
                        <div class="demo-body dynamic-search-demo">
                            <label class="field-label" for="live-search">ค้นหา component ในรายการด้านล่าง</label>
                            <div class="large-search"><span>⌕</span><input id="live-search" type="search" wire:model.live.debounce.250ms="search" placeholder="เช่น toast, Kanban..."><kbd>พิมพ์ได้เลย</kbd></div>
                            <div class="search-results" aria-live="polite">
                                @forelse ($topics as $topic)
                                    <button class="search-result" type="button" wire:click="selectTopic('{{ $topic['id'] }}')"><x-ui.lesson-icon :topic="$topic" /><span><strong>{{ $topic['title'] }}</strong><small>{{ $topic['description'] }}</small></span><span class="result-arrow">↗</span></button>
                                @empty
                                    <div class="no-results"><strong>ไม่พบ component ที่ค้นหา</strong><span>ลองใช้คำอื่นดูนะ</span></div>
                                @endforelse
                            </div>
                        </div>
                    @elseif ($activeTopic === 'notifications')
                        <div class="demo-body notifications-demo">
                            <div class="notification-heading"><span><strong>กล่องข้อความ</strong><small>{{ $unreadCount }} รายการที่ยังไม่อ่าน</small></span><button type="button" wire:click="markAllNotificationsRead" @if ($unreadCount === 0) disabled @endif>อ่านทั้งหมด</button></div>
                            @forelse ($notifications as $index => $notification)
                                <article class="notification-item {{ $notification['read'] ? 'is-read' : '' }}">
                                    <span class="notification-dot"></span>
                                    <span class="notification-copy"><strong>{{ $notification['title'] }}</strong><small>{{ $notification['detail'] }}</small></span>
                                    <button type="button" wire:click="dismissNotification({{ $index }})" aria-label="ปิดการแจ้งเตือน: {{ $notification['title'] }}">×</button>
                                </article>
                            @empty
                                <div class="no-results"><strong>ไม่มีการแจ้งเตือน</strong><span>คุณตามทันทุกอย่างแล้ว</span></div>
                            @endforelse
                        </div>
                    @elseif ($activeTopic === 'kanban')
                        @php
                            $columns = [
                                ['id' => 'todo', 'title' => 'รอทำ', 'color' => 'column-orange'],
                                ['id' => 'progress', 'title' => 'กำลังทำ', 'color' => 'column-purple'],
                                ['id' => 'done', 'title' => 'เสร็จแล้ว', 'color' => 'column-green'],
                            ];
                        @endphp
                        <div class="demo-body kanban-demo">
                            @foreach ($columns as $column)
                                <section class="kanban-column {{ $column['color'] }}" x-on:dragover.prevent x-on:drop.prevent="$wire.moveTask(Number($event.dataTransfer.getData('text/plain')), '{{ $column['id'] }}')">
                                    <div class="column-heading"><span><i></i>{{ $column['title'] }}</span><span>{{ collect($tasks)->where('column', $column['id'])->count() }}</span></div>
                                    @forelse (collect($tasks)->where('column', $column['id']) as $task)
                                        <article class="task-card" draggable="true" x-on:dragstart="$event.dataTransfer.setData('text/plain', '{{ $task['id'] }}')">
                                            <span>{{ $task['title'] }}</span><span class="drag-hint" aria-hidden="true">⠿</span>
                                            <label class="sr-only" for="move-task-{{ $task['id'] }}">ย้ายงาน {{ $task['title'] }}</label>
                                            <select id="move-task-{{ $task['id'] }}" wire:change="moveTask({{ $task['id'] }}, $event.target.value)" aria-label="ย้ายงาน {{ $task['title'] }}">
                                                @foreach ($columns as $option)
                                                    <option value="{{ $option['id'] }}" @selected($option['id'] === $task['column'])>{{ $option['title'] }}</option>
                                                @endforeach
                                            </select>
                                        </article>
                                    @empty
                                        <div class="column-empty">ลากการ์ดมาวางที่นี่</div>
                                    @endforelse
                                </section>
                            @endforeach
                        </div>
                    @endif
                </section>

                <aside class="learning-panel">
                    <div class="learning-panel-heading"><span class="learn-sparkle">✳</span><span class="panel-kicker">WHAT TO NOTICE</span></div>
                    <h2>ลองสังเกต</h2>
                    @if ($activeTopic === 'inline-editing')
                        <ul><li>แยกสถานะกำลังแก้ไขออกจากค่าที่บันทึกแล้ว</li><li>ให้ผู้ใช้ยกเลิกและคืนค่าเดิมได้</li><li>บันทึกได้ทั้งคลิกปุ่มและกด Enter</li></ul>
                    @elseif ($activeTopic === 'toast')
                        <ul><li>ข้อความสั้นและบอกผลลัพธ์ชัดเจน</li><li>toast หายไปเอง แต่ไม่บังการทำงาน</li><li>ประกาศสถานะด้วย role=status</li></ul>
                    @elseif ($activeTopic === 'multi-step')
                        <ul><li>ตรวจข้อมูลก่อนพาไปขั้นต่อไป</li><li>ย้อนกลับได้โดยไม่ล้างข้อมูลที่กรอกไว้</li><li>แสดงตำแหน่งปัจจุบันให้เข้าใจง่าย</li></ul>
                    @elseif ($activeTopic === 'tags')
                        <ul><li>รองรับ Enter เพื่อเพิ่มแท็กอย่างรวดเร็ว</li><li>ป้องกันแท็กซ้ำโดยไม่สนตัวพิมพ์เล็กใหญ่</li><li>จำกัดจำนวนแท็กไม่ให้เกินกำหนด</li></ul>
                    @elseif ($activeTopic === 'search')
                        <ul><li>กรองผลลัพธ์ระหว่างพิมพ์ด้วย debounce</li><li>ค้นหาทั้งชื่อและคำอธิบาย</li><li>ออกแบบสถานะเมื่อไม่พบผลลัพธ์</li></ul>
                    @elseif ($activeTopic === 'notifications')
                        <ul><li>แยกสถานะอ่านแล้วกับยังไม่อ่าน</li><li>นับรายการที่ยังต้องให้ความสนใจ</li><li>ให้ผู้ใช้ปิดรายการได้ด้วยคีย์บอร์ด</li></ul>
                    @else
                        <ul><li>ลากการ์ดไปมาระหว่างคอลัมน์</li><li>ใช้เมนูสถานะเป็นทางเลือกที่เข้าถึงได้</li><li>จำนวนการ์ดอัปเดตตามสถานะ</li></ul>
                    @endif
                    <div class="learning-divider"></div>
                    <div class="stack-heading">IN THIS EXAMPLE</div>
                    <div class="tech-chips"><span>Blade</span><span>Livewire</span><span>Alpine</span></div>
                    <p class="learning-note">ตัวอย่างนี้เก็บสถานะไว้ชั่วคราวระหว่างใช้งานหน้าเว็บ ยังไม่ได้บันทึกลงฐานข้อมูล</p>
                </aside>
            </div>

            <footer class="workspace-footer"><span>COMPONENT COOKBOOK <span class="footer-separator">·</span> HANDS-ON PRACTICE</span><span>ทำทีละชิ้น แล้วค่อยนำไปใช้ในโปรเจกต์จริง <span class="footer-spark">✳</span></span></footer>
        </div>
    </section>

    <div class="toast-message" x-cloak x-show="toast" x-transition.opacity.duration.200ms role="status"><span>✓</span><span x-text="toast"></span><button type="button" @@click="toast = ''" aria-label="ปิดข้อความแจ้งเตือน">×</button></div>
</main>
