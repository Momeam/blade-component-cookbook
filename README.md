# Blade Component Cookbook — พื้นที่ฝึกทำ

โปรเจกต์ฝึกทำ UI components ตามหัวข้อในซีรีส์ Blade Component Cookbook โดยใช้ Laravel, Blade, Livewire และ Alpine.js
หน้าแรกเป็นพื้นที่ฝึกแบบ interactive เลือกหัวข้อจากแถบด้านซ้ายแล้วทดลอง component ได้ทันที โครงสร้างตัวอย่าง Blade component ที่ใช้ซ้ำอยู่ใน `resources/views/components/ui`

## เริ่มต้นใช้งาน

เปิด PowerShell ในโฟลเดอร์ `blade-component-cookbook` แล้วรัน:


composer install
npm install
npm run build
php artisan serve
```

`http://127.0.0.1:8000`

## ตัวอย่างที่ลองได้

- **Inline editing:** แก้ไขข้อความ บันทึก หรือยกเลิก
- **Toast notifications:** ทดลอง feedback หลังบันทึก
- **Multi-step flows:** กรอกข้อมูลทีละขั้นพร้อมตรวจสอบชื่อและอีเมล
- **Tag inputs:** เพิ่มและลบแท็ก ป้องกันรายการซ้ำ
- **Dynamic search:** ค้นหาและกรอง components ระหว่างพิมพ์
- **Notifications:** ทำเครื่องหมายว่าอ่านแล้วและปิดรายการ
- **Kanban board:** ลากการ์ดข้ามคอลัมน์ หรือเปลี่ยนสถานะจากเมนู

สถานะตัวอย่างอยู่ใน Livewire component เพื่อให้ทดลอง interaction ได้โดยไม่ต้องตั้งค่าฐานข้อมูล

## ตรวจสอบ

```powershell
php artisan test --filter=ComponentPlaygroundTest
npm run build
```
