<div class="site-shell">
        <header class="topbar">
            <a class="brand" href="{{ route('home') }}" aria-label="UI, With Care หน้าแรก">
                <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span></span>
                <span>little<span class="brand-dot">/</span>interfaces</span>
            </a>
            <nav class="topnav" aria-label="เมนูหลัก">
                <a href="#รายละเอียด">เกี่ยวกับคลาส</a>
                <a href="#หัวข้อ">สิ่งที่จะได้สร้าง</a>
                <a class="nav-cta" href="#ทดลอง">ลองเล่น component <span aria-hidden="true">↗</span></a>
            </nav>
        </header>

        <main>
            <section class="hero" id="รายละเอียด">
                <div class="hero-copy">
                    <p class="eyebrow"><span class="eyebrow-dot"></span> UI COMPONENT COOKBOOK <span class="eyebrow-divider">/</span> LIVEWIRE + ALPINE</p>
                    <h1>อินเทอร์เฟซเล็ก ๆ<br>ที่ทำให้ <span class="headline-mark">รู้สึกดี</span></h1>
                    <p class="hero-description">ลงมือทำ UI components ที่เจอได้ในแอปจริง ตั้งแต่การแก้ไขข้อความ ไปจนถึงบอร์ดงานที่ลากวางได้ พร้อมใส่ใจทุกจังหวะการใช้งาน</p>
                    <div class="hero-actions">
                        <a class="button button-dark" href="#หัวข้อ">สำรวจหัวข้อ <span aria-hidden="true">↓</span></a>
                        <span class="hero-note"><span class="sparkle" aria-hidden="true">✳</span> ทำตามได้ทีละชิ้น</span>
                    </div>
                    <div class="hero-meta">
                        <span><i class="meta-check" aria-hidden="true">✓</i> Blade components</span>
                        <span><i class="meta-check" aria-hidden="true">✓</i> Livewire state</span>
                        <span><i class="meta-check" aria-hidden="true">✓</i> Alpine interactions</span>
                    </div>
                </div>

                <div class="hero-art" aria-label="ภาพตัวอย่างการ์ด UI component">
                    <div class="art-orbit orbit-one"></div>
                    <div class="art-orbit orbit-two"></div>
                    <div class="art-caption"><span class="caption-dot"></span> SMALL DETAILS, BIG FEELING</div>
                    <div class="floating-chip chip-one"><span class="chip-icon">⌘</span> keyboard friendly</div>
                    <div class="floating-chip chip-two"><span class="chip-icon chip-icon-green">↻</span> autosave on</div>
                    <div class="preview-window">
                        <div class="window-top">
                            <div class="window-dots"><span></span><span></span><span></span></div>
                            <span class="window-title">project / details</span>
                            <span class="window-menu">···</span>
                        </div>
                        <div class="preview-content">
                            <div class="preview-label">PROJECT NAME <span>↗</span></div>
                            <div class="preview-edit">
                                <span>Spring refresh</span>
                                <span class="edit-icon">↗</span>
                            </div>
                            <div class="preview-divider"></div>
                            <div class="preview-bottom">
                                <div class="avatar-stack" aria-label="สมาชิก 3 คน"><span>ม</span><span>น</span><span>+</span></div>
                                <span class="saved-label"><i></i> บันทึกแล้ว</span>
                            </div>
                        </div>
                    </div>
                    <div class="art-sticker"><span>MAKE IT<br>FEEL RIGHT</span><b aria-hidden="true">✳</b></div>
                    <span class="art-index">FIG. 01 — THE DETAILS MATTER</span>
                </div>
            </section>

            <section class="principles" aria-label="หลักการเรียนรู้">
                <div class="principle-intro"><span class="section-kicker">THE APPROACH</span><span>ไม่ใช่แค่ให้ทำงานได้<br>แต่ต้อง <em>รู้สึกดีที่ได้ใช้</em></span></div>
                <div class="principle"><span class="principle-number">01</span><span class="principle-icon icon-orange">↯</span><strong>เริ่มจากปัญหาจริง</strong><p>สร้างจากรูปแบบที่ผู้ใช้คุ้นเคย</p></div>
                <div class="principle"><span class="principle-number">02</span><span class="principle-icon icon-purple">⌘</span><strong>คิดถึงทุกการโต้ตอบ</strong><p>คีย์บอร์ด สถานะ และ feedback</p></div>
                <div class="principle"><span class="principle-number">03</span><span class="principle-icon icon-green">↗</span><strong>นำกลับไปใช้ต่อได้</strong><p>แยกชิ้นส่วนให้ดูแลง่าย</p></div>
            </section>

            <section class="topics-section" id="หัวข้อ">
                <div class="section-heading">
                    <div>
                        <span class="section-kicker">THE COMPONENT MENU</span>
                        <h2>หนึ่งชิ้นเล็ก ๆ<br>ต่อยอดได้อีก <span>หลายอย่าง</span></h2>
                    </div>
                    <p>หัวข้อจากคำอธิบายซีรีส์ คัดมาเป็นแนวทางให้เห็นภาพว่าจะได้ลองสร้างอะไรบ้าง</p>
                </div>

                <div class="topic-layout">
                    <aside class="topic-aside">
                        <div class="aside-note">
                            <span class="aside-sun" aria-hidden="true">✳</span>
                            <p>“ความลื่นไหลมักซ่อนอยู่ในรายละเอียดที่เราแทบไม่ทันสังเกต”</p>
                            <span class="aside-credit">A NOTE TO BUILD BY</span>
                        </div>
                        <div class="stack-card">
                            <span class="stack-card-label">THE TOOLKIT</span>
                            <div class="stack-item"><span class="stack-letter laravel">L</span><span><strong>Laravel</strong><small>โครงสร้างแอป</small></span><span class="stack-arrow">↗</span></div>
                            <div class="stack-item"><span class="stack-letter livewire">W</span><span><strong>Livewire</strong><small>สถานะและการทำงาน</small></span><span class="stack-arrow">↗</span></div>
                            <div class="stack-item"><span class="stack-letter alpine">A</span><span><strong>Alpine.js</strong><small>ปฏิสัมพันธ์ในหน้า</small></span><span class="stack-arrow">↗</span></div>
                        </div>
                    </aside>

                    <div class="topic-main">
                        <label class="search-box">
                            <span class="search-icon" aria-hidden="true">⌕</span>
                            <span class="sr-only">ค้นหาหัวข้อ component</span>
                            <input type="search" wire:model.live.debounce.250ms="search" placeholder="ลองค้นหา เช่น keyboard, tag, Kanban..." autocomplete="off">
                            <kbd>ค้นหา</kbd>
                        </label>

                        <div class="topic-list" aria-live="polite">
                            @forelse ($lessons as $index => $lesson)
                                <article class="topic-card">
                                    <div class="topic-count">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                    <div class="topic-icon {{ $lesson['color'] }}">{{ $lesson['icon'] }}</div>
                                    <div class="topic-details">
                                        <span class="topic-category">{{ $lesson['category'] }}</span>
                                        <h3>{{ $lesson['title'] }}</h3>
                                        <p>{{ $lesson['description'] }}</p>
                                    </div>
                                    <span class="topic-arrow" aria-hidden="true">↗</span>
                                </article>
                            @empty
                                <div class="empty-state">
                                    <span aria-hidden="true">⌕</span>
                                    <strong>ยังไม่เจอหัวข้อนี้</strong>
                                    <p>ลองเปลี่ยนคำค้นดูอีกครั้ง</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="list-foot"><span>SHOWING {{ str_pad($lessons->count(), 2, '0', STR_PAD_LEFT) }} TOPICS</span><span>ค่อย ๆ เรียนรู้ แล้วนำไปประกอบกัน</span></div>
                    </div>
                </div>
            </section>

            <section class="playground" id="ทดลอง" x-data="{ toast: false }" @@component-saved.window="toast = true; setTimeout(() => toast = false, 2600)">
                <div class="playground-copy">
                    <span class="section-kicker">A TINY LIVE PREVIEW</span>
                    <h2>ลองแก้ข้อความ<br>ดูสัก <span>นิดไหม?</span></h2>
                    <p>ตัวอย่างเล็ก ๆ ของ inline editing ที่ใช้ Livewire จัดการสถานะ และ Alpine แสดง feedback หลังบันทึก</p>
                    <span class="playground-foot"><span class="live-dot"></span> INTERACTIVE COMPONENT PREVIEW</span>
                </div>
                <div class="playground-card">
                    <div class="playground-card-top"><span>PROJECT NOTE</span><span class="card-menu">···</span></div>
                    <div class="editable-area">
                        @if ($editing)
                            <label class="sr-only" for="project-note">ข้อความใน project note</label>
                            <input id="project-note" class="note-input" type="text" wire:model="note" wire:keydown.enter="saveNote" maxlength="120" autofocus>
                            <div class="edit-actions">
                                <button class="save-button" type="button" wire:click="saveNote">บันทึก <span aria-hidden="true">↗</span></button>
                                <button class="cancel-button" type="button" wire:click="cancelEditing">ยกเลิก</button>
                            </div>
                        @else
                            <button class="note-display" type="button" wire:click="startEditing" aria-label="แก้ไขข้อความ project note">
                                <span>{{ $savedNote }}</span><span class="inline-edit-icon" aria-hidden="true">↗</span>
                            </button>
                            <span class="edit-hint">คลิกข้อความเพื่อแก้ไข</span>
                        @endif
                    </div>
                    <div class="playground-card-bottom"><span class="tiny-avatar">ม</span><span>แก้ไขล่าสุดโดยคุณ</span><span class="autosave-status"><i></i> พร้อมบันทึก</span></div>
                    <div class="toast-message" x-cloak x-show="toast" x-transition.opacity.duration.200ms role="status"><span>✓</span> บันทึกเรียบร้อยแล้ว</div>
                </div>
            </section>

            <footer class="footer">
                <a class="brand footer-brand" href="{{ route('home') }}">
                    <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span></span>
                    <span>little<span class="brand-dot">/</span>interfaces</span>
                </a>
                <span>สร้างด้วยความใส่ใจ ทีละ component</span>
                <a class="back-top" href="#รายละเอียด">กลับขึ้นด้านบน <span aria-hidden="true">↑</span></a>
            </footer>
        </main>
</div>
