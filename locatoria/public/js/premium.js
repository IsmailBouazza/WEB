
  window.onload = function() {  
    const slider = new AutoSlider("#main-slider");
    document.querySelector('h1').innerHTML = `${slider.delay / 1000}`
  };
  
  class AutoSlider {
    constructor(element) {
        this.el = document.querySelector(element);
        this.init();
    }
  
    init() {
        this.slides = this.el.querySelectorAll(".slide");
        this.index = 0;
        this.timer = null;
        this.delay = 4000;
        this.action();
        this.addHoverListener();
    }
  
    _slideTo(slide) {
        const currentSlide = this.slides[slide];
        currentSlide.style.opacity = 1;
  
        for (let i = 0; i < this.slides.length; i++) {
            let slide = this.slides[i];
            if (slide !== currentSlide) {
                slide.style.opacity = 0;
            }
        }
    }
  
    action() {
        this.timer = setInterval(function () {
            this.index++;
            if (this.index == this.slides.length) {
                this.index = 0;
            }
            this._slideTo(this.index);
        }.bind(this), this.delay);
    }
  
    addHoverListener() {
        this.el.addEventListener("mouseover", function () {
            clearInterval(this.timer);
            this.timer = null;
        }.bind(this));
      
        this.el.addEventListener("mouseout", function () {
            this.action();
        }.bind(this));
    }
  }
  
  