document.onreadystatechange = function () {
    if (document.readyState == "interactive") {
        // Initialize your application or run some code.
        new Splide( '.splide' ).mount();
        new Splide('#newestPosts', {
            perPage: 2,
            pagination: true,
            autoplay: true,
        }).mount();
    }
}