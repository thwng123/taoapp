// Blog Scripts
document.addEventListener('DOMContentLoaded', function() {
    
    // Lazy loading cho hình ảnh
    const images = document.querySelectorAll('.blog_card img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        if (img.dataset.src) {
            imageObserver.observe(img);
        }
    });

    // Smooth scroll cho pagination
    const paginationLinks = document.querySelectorAll('.pagination a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetUrl = this.href;
            
            // Thêm loading state
            document.querySelector('.blog_posts').classList.add('loading');
            
            // Smooth scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            // Navigate to new page after short delay
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 300);
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.blog-search input');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase();
            const blogCards = document.querySelectorAll('.blog_card');
            
            blogCards.forEach(card => {
                const title = card.querySelector('h2 a').textContent.toLowerCase();
                const excerpt = card.querySelector('.card_body p').textContent.toLowerCase();
                const category = card.querySelector('.blog_category a').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || excerpt.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }, 300));
    }

    // Filter by category
    const categoryFilters = document.querySelectorAll('.category-filter');
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.dataset.category;
            const blogCards = document.querySelectorAll('.blog_card');
            
            // Remove active class from all filters
            categoryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            blogCards.forEach(card => {
                const cardCategory = card.querySelector('.blog_category a').textContent.toLowerCase();
                if (category === 'all' || cardCategory === category.toLowerCase()) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Share functionality
    const shareButtons = document.querySelectorAll('.share-btn');
    shareButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.dataset.url;
            const title = this.dataset.title;
            const platform = this.dataset.platform;
            
            let shareUrl = '';
            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
                    break;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    });

    // Bookmark functionality
    const bookmarkButtons = document.querySelectorAll('.bookmark-btn');
    bookmarkButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const postId = this.dataset.postId;
            const isBookmarked = this.classList.contains('bookmarked');
            
            if (isBookmarked) {
                // Remove from bookmarks
                this.classList.remove('bookmarked');
                this.innerHTML = '<i class="far fa-bookmark"></i>';
                removeBookmark(postId);
            } else {
                // Add to bookmarks
                this.classList.add('bookmarked');
                this.innerHTML = '<i class="fas fa-bookmark"></i>';
                addBookmark(postId);
            }
        });
    });

    // Infinite scroll (optional)
    let isLoading = false;
    let currentPage = 1;
    const loadMoreBtn = document.querySelector('.load-more-btn');
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            if (!isLoading) {
                loadMorePosts();
            }
        });
    }

    // Scroll to top button
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollToTopBtn.className = 'scroll-to-top';
    scrollToTopBtn.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #007cba;
        color: white;
        border: none;
        cursor: pointer;
        display: none;
        z-index: 1000;
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(scrollToTopBtn);
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });
    
    scrollToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Utility functions
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function addBookmark(postId) {
        let bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
        if (!bookmarks.includes(postId)) {
            bookmarks.push(postId);
            localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
        }
    }

    function removeBookmark(postId) {
        let bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
        bookmarks = bookmarks.filter(id => id !== postId);
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    }

    function loadMorePosts() {
        isLoading = true;
        currentPage++;
        
        // Show loading state
        const loadMoreBtn = document.querySelector('.load-more-btn');
        if (loadMoreBtn) {
            loadMoreBtn.innerHTML = 'Đang tải...';
            loadMoreBtn.disabled = true;
        }
        
        // Simulate AJAX request
        setTimeout(() => {
            // Here you would make an actual AJAX request to load more posts
            // For now, we'll just re-enable the button
            if (loadMoreBtn) {
                loadMoreBtn.innerHTML = 'Tải thêm bài viết';
                loadMoreBtn.disabled = false;
            }
            isLoading = false;
        }, 1000);
    }

    // Initialize bookmarked posts
    const bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
    bookmarkButtons.forEach(button => {
        const postId = button.dataset.postId;
        if (bookmarks.includes(postId)) {
            button.classList.add('bookmarked');
            button.innerHTML = '<i class="fas fa-bookmark"></i>';
        }
    });

    // Add hover effects for better UX
    const blogCards = document.querySelectorAll('.blog_card');
    blogCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Keyboard navigation for accessibility
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close any open modals or dropdowns
            const openModals = document.querySelectorAll('.modal.show');
            openModals.forEach(modal => {
                modal.classList.remove('show');
            });
        }
    });

    // Add loading animation for images
    images.forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        
        img.addEventListener('error', function() {
            this.src = 'https://via.placeholder.com/400x250?text=Image+Not+Found';
        });
    });

    console.log('Blog scripts loaded successfully!');
}); 