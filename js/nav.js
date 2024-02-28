//-------------------------------------------------------------
$(document).on("scroll", function(){
    if($(document).scrollTop() > 86)
    {
      $("#navbar").addClass("sticky");
      $("#nav-logo").addClass("color-white");
      $(".nav-custom-link").addClass("color-white");
      $(".navbar-btn").addClass("nav-btn-icon");
    }
    else
    {
        $("#navbar").removeClass("sticky");
        $("#nav-logo").removeClass("color-white");
        $(".nav-custom-link").removeClass("color-white");
        $(".navbar-btn").removeClass("nav-btn-icon");
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll(".section");
  
    function fadeIn(element) {
      element.style.opacity = 1;
    }
  
    function handleIntersection(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          fadeIn(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.2
    };
  
    const observer = new IntersectionObserver(handleIntersection, observerOptions);
  
    sections.forEach(function(section) {
      observer.observe(section);
    });
      });
//----------------------------------------------------------------
function toggleImages() {
  var container = document.getElementById("image-container");
  var button = document.getElementById("toggle-button");

  if (container.classList.contains("hidden-images")) {
    container.classList.remove("hidden-images");
    button.innerHTML = "Less More";
  } else {
    container.classList.add("hidden-images");
    button.innerHTML = "View More";
  }
}
//---------------------------------------------------------------

//------------------------------------------------------------------------------------------------
    const slider = document.getElementById('slider');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    prevBtn.addEventListener('click', () => {
      slider.scrollLeft -= slider.offsetWidth;
    });

    nextBtn.addEventListener('click', () => {
      slider.scrollLeft += slider.offsetWidth;
    });
  //--------------------------------------------------------
  function openPopup() {
    document.getElementById('popup').style.display = 'block';
  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
  }