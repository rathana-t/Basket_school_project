<p>Price Range</p>
<section class="range-slider">
    <span class="rangeValues"></span>
    <input value="500" min="500" max="50000" step="500" type="range">
    <input value="50000" min="500" max="50000" step="500" type="range">
</section>

<style>
    @mixin range-slider($width, $height, $input-top, $input-bg-color, $input-thumb-color, $float:none, $input-height:20px, $input-border-radius:14px) {
        position: relative;
        width: $width;
        height: $height;
        float: $float;
        text-align: center;

        input[type="range"] {
            pointer-events: none;
            position: absolute;
            -webkit-appearance: none;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            border: none;
            border-radius: $input-border-radius;
            background: $input-bg-color;
            box-shadow: inset 0 1px 0 0 darken($input-bg-color, 15%), inset 0 -1px 0 0 darken($input-bg-color, 10%);
            -webkit-box-shadow: inset 0 1px 0 0 darken($input-bg-color, 15%), inset 0 -1px 0 0 darken($input-bg-color, 10%);
            overflow: hidden;
            left: 0;
            top: $input-top;
            width: $width;
            outline: none;
            height: $input-height;
            margin: 0;
            padding: 0;
        }

        input[type="range"]::-webkit-slider-thumb {
            pointer-events: all;
            position: relative;
            z-index: 1;
            outline: 0;
            -webkit-appearance: none;
            width: $input-height;
            height: $input-height;
            border: none;
            border-radius: $input-border-radius;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, lighten($input-thumb-color, 60%)), color-stop(100%, $input-thumb-color));
            /* android <= 2.2 */
            background-image: -webkit-linear-gradient(top, lighten($input-thumb-color, 60%) 0, $input-thumb-color 100%);
            /* older mobile safari and android > 2.2 */
            ;
            background-image: linear-gradient(to bottom, lighten($input-thumb-color, 60%) 0, $input-thumb-color 100%);
            /* W3C */
        }

        input[type="range"]::-moz-range-thumb {
            pointer-events: all;
            position: relative;
            z-index: 10;
            -moz-appearance: none;
            width: $input-height;
            height: $input-height;
            border: none;
            border-radius: $input-border-radius;
            background-image: linear-gradient(to bottom, lighten($input-thumb-color, 60%) 0, $input-thumb-color 100%);
            /* W3C */
        }

        input[type="range"]::-ms-thumb {
            pointer-events: all;
            position: relative;
            z-index: 10;
            -ms-appearance: none;
            width: $input-height;
            height: $input-height;
            border-radius: $input-border-radius;
            border: 0;
            background-image: linear-gradient(to bottom, lighten($input-thumb-color, 60%) 0, $input-thumb-color 100%);
            /* W3C */
        }

        input[type=range]::-moz-range-track {
            position: relative;
            z-index: -1;
            background-color: rgba(0, 0, 0, 1);
            border: 0;
        }

        input[type=range]:last-of-type::-moz-range-track {
            -moz-appearance: none;
            background: none transparent;
            border: 0;
        }

        input[type=range]::-moz-focus-outer {
            border: 0;
        }
    }

</style>
section.range-slider {
@include range-slider(300px, 300px, 50px #F1EFEF, #413F41, left);
}
<script>
    function getVals() {
        // Get slider values
        var parent = this.parentNode;
        var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat(slides[0].value);
        var slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            var tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        var displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$ " + slide1 + "k - $" + slide2 + "k";
    }

    window.onload = function() {
        // Initialize Sliders
        var sliderSections = document.getElementsByClassName("range-slider");
        for (var x = 0; x < sliderSections.length; x++) {
            var sliders = sliderSections[x].getElementsByTagName("input");
            for (var y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
</script>
