# Hướng dẫn sử dụng hệ thống App Sample

## Tổng quan

Hệ thống này cho phép bạn tạo và hiển thị các ứng dụng mẫu với đầy đủ thông tin như tên app, mô tả, icon, link store, đánh giá, v.v.

## Cách sử dụng

### 1. Tạo bài viết mới cho App Sample

1. **Vào WordPress Admin** → Posts → Add New
2. **Điền thông tin cơ bản:**
   - Title: Tên ứng dụng
   - Content: Mô tả chi tiết về ứng dụng
   - Featured Image: Ảnh đại diện (nếu không có icon URL)

3. **Điền thông tin trong metabox "Thông tin bổ sung cho App Sample":**
   - **Tên ứng dụng**: Tên chính thức của app
   - **Mô tả ứng dụng**: Mô tả ngắn gọn về chức năng
   - **URL Icon ứng dụng**: Link icon từ Play Store/App Store
   - **URL Play Store**: Link đến Google Play Store
   - **URL App Store**: Link đến Apple App Store (nếu có)
   - **Tên nhà phát triển**: Tên công ty/nhà phát triển
   - **Danh mục ứng dụng**: Chọn danh mục phù hợp
   - **Đánh giá**: Điểm từ 1-5 (có thể có số thập phân)
   - **Số lượt tải**: Ví dụ: 10K+, 1M+, 500K+

4. **Publish bài viết**

### 2. Tự động phân loại

- Tất cả bài viết sẽ tự động được gán vào danh mục "App Sample"
- Danh mục này sẽ được tạo tự động nếu chưa có

### 3. Hiển thị trên trang

- Trang sẽ hiển thị tất cả bài viết thuộc danh mục "App Sample"
- Mỗi trang hiển thị 12 ứng dụng
- Có phân trang đầy đủ
- Responsive design cho mọi thiết bị

## Cấu trúc Metabox

### Thông tin bắt buộc:
- **Tên ứng dụng**: Hiển thị trong card
- **Mô tả ứng dụng**: Mô tả ngắn gọn
- **URL Icon**: Icon của ứng dụng

### Thông tin tùy chọn:
- **Play Store URL**: Link đến Google Play
- **App Store URL**: Link đến Apple App Store
- **Developer Name**: Tên nhà phát triển
- **App Category**: Danh mục ứng dụng
- **Rating**: Đánh giá từ 1-5 sao
- **Download Count**: Số lượt tải

## Danh mục ứng dụng có sẵn:

- Business
- Entertainment
- Education
- Finance
- Health
- Lifestyle
- Shopping
- Social
- Travel
- Utilities

## Ví dụ dữ liệu mẫu:

```
Tên ứng dụng: Divinergy
Mô tả: My mission is to provide quality integrated health methods to promote a more wholistic approach to healing and living
Icon URL: https://play-lh.googleusercontent.com/L0gI2xOquSQjCjh_5Q4--QMJ2dfVOxxkHqyv0y3yhRBAHW4RQxOMJRS767XuE8nqqn4=w240-h480
Play Store URL: https://play.google.com/store/apps/details?id=org.divinergy.app
Developer: Divinergy Health
Category: Health
Rating: 4.5
Downloads: 10K+
```

## Tính năng hiển thị:

### 1. Card Layout
- Icon ứng dụng với background gradient
- Tên ứng dụng nổi bật
- Mô tả ngắn gọn
- Thông tin meta (developer, category, rating, downloads)
- Nút link đến store

### 2. Responsive Design
- Desktop: 3-4 cards per row
- Tablet: 2 cards per row
- Mobile: 1 card per row

### 3. Hover Effects
- Card nâng lên khi hover
- Shadow effect
- Smooth transitions

### 4. Pagination
- Hiển thị 12 apps per page
- Navigation với Previous/Next
- Page numbers
- Thông tin tổng số

## Troubleshooting

### 1. Metabox không hiển thị
- Kiểm tra user permissions
- Clear cache
- Kiểm tra functions.php

### 2. Danh mục không tự động gán
- Kiểm tra slug "app-sample" có tồn tại
- Tạo thủ công trong Categories

### 3. Icon không hiển thị
- Kiểm tra URL icon có hợp lệ
- Sử dụng Featured Image làm fallback

### 4. Phân trang không hoạt động
- Kiểm tra permalink settings
- Clear cache

## Tùy chỉnh

### 1. Thay đổi số apps per page
```php
$posts_per_page = 12; // Thay đổi số này
```

### 2. Thêm danh mục mới
```php
<option value="NewCategory">New Category</option>
```

### 3. Thay đổi màu sắc
```css
.card .icon {
    background: linear-gradient(135deg, #your-color1 0%, #your-color2 100%);
}
```

## SEO và Performance

- Tất cả URLs được escape đúng cách
- Alt text cho images
- Semantic HTML structure
- Mobile-first responsive design
- Optimized CSS và JavaScript

## Support

Nếu gặp vấn đề:
1. Kiểm tra WordPress version compatibility
2. Kiểm tra theme compatibility
3. Clear cache
4. Kiểm tra file permissions 