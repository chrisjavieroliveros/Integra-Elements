/**
 * GSAP ScrollSmoother initialization
 * 
 * This file initializes ScrollSmoother for smooth scrolling throughout the site.
 * ScrollSmoother requires ScrollTrigger and specific HTML structure.
 */

document.addEventListener('DOMContentLoaded', function () {

  // Add loading class to prevent content jump
  document.body.classList.add('scroll-smoother-loading');

  // Register ScrollTrigger plugin
  gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  // Initialize ScrollSmoother
  let smoother = ScrollSmoother.create(
    {
      wrapper: "#smooth-wrapper",
      content: "#smooth-content",
      smooth: 1.2,               // How long (in seconds) it takes to "catch up" to the native scroll position
      effects: true,             // looks for data-speed and data-lag attributes on elements
      smoothTouch: 0.1,          // much shorter smoothing time on touch devices (default is NO smoothing on touch devices)
      normalizeScroll: true,     // prevents address bar from showing/hiding on most devices, solves various other browser inconsistencies
      ignoreMobileResize: true,  // skips ScrollTrigger.refresh() on mobile resizes from address bar showing/hiding
    });

  // Remove loading class and add loaded class
  document.body.classList.remove('scroll-smoother-loading');
  document.body.classList.add('scroll-smoother-loaded');

  // Optional: Add some basic scroll-triggered animations
  // You can uncomment and customize these as needed

  // Fade in Elementor Elements on scroll
  // gsap.utils.toArray('.elementor-widget').forEach((elem, index) => {
  //   console.log(`Setting up scroll animation for element ${index}:`, elem);

  //   // Create the animation
  //   const animation = gsap.fromTo(elem, {
  //     opacity: 0,
  //     y: 56
  //   }, {
  //     opacity: 1,
  //     y: 0,
  //     duration: 0.5,
  //     scrollTrigger: {
  //       trigger: elem,
  //       start: "top 80%",
  //       end: "bottom 20%",
  //       toggleActions: "play none none none", // Changed to reverse animations when scrolling up
  //       onEnter: () => console.log(`Element ${index} animation entered`),
  //       onLeave: () => console.log(`Element ${index} animation left`),
  //       onEnterBack: () => console.log(`Element ${index} animation entered back`),
  //       onLeaveBack: () => console.log(`Element ${index} animation left back`),
  //       // markers: true, // Visual debug markers (remove in production)
  //     },
  //     ease: "power2.out",
  //     onStart: () => console.log(`Animation started for element ${index}`),
  //     onComplete: () => console.log(`Animation completed for element ${index}`)
  //   });

  //   return animation; // Return the animation instance for potential later use
  // });

  /*
  
  // Parallax effect for elements with data-speed attribute
  gsap.utils.toArray('[data-speed]').forEach((elem) => {
      let speed = elem.getAttribute('data-speed');
      gsap.to(elem, {
          y: () => (1 - speed) * ScrollTrigger.maxScroll(window),
          ease: "none",
          scrollTrigger: {
              trigger: elem,
              start: "top bottom",
              end: "bottom top",
              scrub: true,
              invalidateOnRefresh: true
          }
      });
  });
  */

  // Refresh ScrollTrigger when images load
  window.addEventListener('load', () => {
    ScrollTrigger.refresh();
  });

  // Handle window resize
  window.addEventListener('resize', () => {
    ScrollTrigger.refresh();
  });

  // console.log('ScrollSmoother initialized successfully');
});
