# Hệ thống Blog WordPress với Metabox và Phân trang

## Tổng quan

Hệ thống blog này được xây dựng với các tính năng:
- Hiển thị tất cả bài viết từ WordPress
- Metabox cho thông tin bổ sung
- Phân trang đầy đủ
- Responsive design
- Tương tác JavaScript

## Cấu trúc Files

### 1. Functions.php
- `add_post_metabox()`: Thêm metabox cho bài viết
- `post_metabox_callback()`: Hiển thị form metabox
- `save_post_metabox()`: Lưu dữ liệu metabox
- `get_post_meta_data()`: Helper function để lấy thông tin bài viết

### 2. Page-bai-viet.php
- Hiển thị danh sách bài viết
- Phân trang
- Responsive design
- Tích hợp metabox data

### 3. CSS (blog-style.css)
- Grid layout cho blog cards
- Hover effects
- Pagination styles
- Responsive breakpoints

### 4. JavaScript (blog-script.js)
- Lazy loading cho hình ảnh
- Smooth scroll pagination
- Search functionality
- Category filtering
- Share buttons
- Bookmark system

## Metabox Fields

### Thông tin bổ sung
1. **URL Ảnh đại diện**: URL tùy chỉnh cho ảnh đại diện
2. **Thời gian đọc**: Ước tính thời gian đọc (phút)
3. **Tên tác giả**: Tên tác giả tùy chỉnh
4. **Màu danh mục**: Màu hiển thị cho danh mục

### Thông tin bổ sung (Custom Fields)
1. **Phụ đề**: Phụ đề cho bài viết
2. **Trích dẫn nổi bật**: Trích dẫn quan trọng
3. **URL Video**: Link video liên quan

## Cách sử dụng

### 1. Tạo bài viết mới
1. Vào WordPress Admin → Posts → Add New
2. Điền tiêu đề và nội dung
3. Trong metabox "Thông tin bổ sung":
   - Nhập URL ảnh đại diện (nếu không có featured image)
   - Đặt thời gian đọc ước tính
   - Nhập tên tác giả
   - Chọn màu danh mục
4. Trong metabox "Thông tin bổ sung":
   - Nhập phụ đề
   - Thêm trích dẫn nổi bật
   - Nhập URL video (nếu có)
5. Publish bài viết

### 2. Tùy chỉnh hiển thị
- Số bài viết mỗi trang: Thay đổi `$posts_per_page` trong page-bai-viet.php
- Layout grid: Chỉnh sửa CSS trong blog-style.css
- Màu sắc: Thay đổi CSS variables

### 3. Thêm tính năng mới
- Search: Thêm input search vào template
- Filter: Thêm category filter buttons
- Share: Thêm share buttons với data attributes

## Tính năng nâng cao

### 1. Lazy Loading
```javascript
// Tự động lazy load hình ảnh khi scroll
const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
        }
    });
});
```

### 2. Search và Filter
```javascript
// Search real-time
searchInput.addEventListener('input', debounce(function() {
    const searchTerm = this.value.toLowerCase();
    // Filter blog cards
}, 300));
```

### 3. Bookmark System
```javascript
// Lưu bookmark vào localStorage
function addBookmark(postId) {
    let bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
    if (!bookmarks.includes(postId)) {
        bookmarks.push(postId);
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    }
}
```

## Responsive Design

### Breakpoints
- Desktop: > 768px
- Tablet: 768px - 480px
- Mobile: < 480px

### Grid Layout
```css
.blog_posts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}
```

## SEO và Performance

### 1. Meta Tags
- Tự động tạo meta description từ excerpt
- Open Graph tags cho social sharing
- Structured data cho blog posts

### 2. Performance
- Lazy loading cho hình ảnh
- Minified CSS và JS
- Caching cho pagination

### 3. Accessibility
- Keyboard navigation
- ARIA labels
- Screen reader friendly

## Troubleshooting

### 1. Metabox không hiển thị
- Kiểm tra functions.php có được load không
- Kiểm tra user permissions
- Clear cache nếu có

### 2. Phân trang không hoạt động
- Kiểm tra permalink settings
- Đảm bảo .htaccess được cấu hình đúng
- Kiểm tra query parameters

### 3. CSS không load
- Kiểm tra đường dẫn file CSS
- Clear browser cache
- Kiểm tra file permissions

## Tùy chỉnh nâng cao

### 1. Thêm Custom Post Type
```php
register_post_type('article', array(
    'labels' => array(
        'name' => 'Bài viết',
        'singular_name' => 'Bài viết'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
));
```

### 2. AJAX Pagination
```javascript
function loadMorePosts() {
    fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        // Append new posts
    });
}
```

### 3. Infinite Scroll
```javascript
window.addEventListener('scroll', function() {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        loadMorePosts();
    }
});
```

## Changelog

### Version 1.0
- Tạo metabox system
- Implement phân trang
- Responsive design
- JavaScript interactions

### Version 1.1 (Planned)
- AJAX pagination
- Advanced search
- Social sharing
- Bookmark system

## Support

Nếu gặp vấn đề, hãy kiểm tra:
1. WordPress version compatibility
2. Theme compatibility
3. Plugin conflicts
4. Server configuration

## License

MIT License - Tự do sử dụng và chỉnh sửa. 