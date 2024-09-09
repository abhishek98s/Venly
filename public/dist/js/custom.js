// $(document).ready(function () {
//   // banner background image src
//   $(".isBGImg").each(function () {
//     var imgURL = $(this).find("img").attr("src");
//     $(this).css("background-image", "url(" + imgURL + ")");
//   });
// });

// $(function () {
//   initScrollToTop();
// });

// function initScrollToTop() {
//   //Check to see if the window is top if not then display button
//   $(window).scroll(function () {
//     var scrollTop = $(window).scrollTop(),
//       docHeight = $(document).height(),
//       winHeight = $(window).height(),
//       scrollPercent = scrollTop / (docHeight - winHeight),
//       scrollPercentRounded = Math.round(scrollPercent * 100);
//     if (scrollPercentRounded > 50) {
//       $(".topTop").css({
//         opacity: 1,
//         transform: "translateY(-50%)",
//       });
//     } else {
//       $(".topTop").css({
//         opacity: 0,
//         transform: "translateY(50%)",
//       });
//     }
//   });

//   // Click event to scroll to top
//   $(".topTop").click(function () {
//     $("html, body").animate(
//       {
//         scrollTop: 0,
//       },
//       1000
//     );
//     return false;
//   });
// }

// Get the icon-menu element
const iconMenu = document.querySelector('.icon-menu');

// Get the destination element
const destination = document.querySelector('.nav_items_wrapper');
const modelDestination = document.querySelector('.booking-wrapper');

iconMenu.addEventListener('click', () => {
  destination.classList.toggle('active');
});

function toggleModal() {
  modelDestination.classList.toggle('active');
}