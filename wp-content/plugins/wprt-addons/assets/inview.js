"use strict";

! function($, e, t, n) {
    function i(e, t) {
        this.element = e, this.$element = $(e), this.options = $.extend({}, s, t), this._defaults = s, this._name = a, this.init()
    }
    var a = "deeperInView",
        s = {
            delayTime: 0,
            onImagesLoaded: !1
        };
    i.prototype = {
        init: function e() {
            this.onInview()
        },
        onInview: function e() {
            var t = this,
                n = this._getThreshold(),
                i = this.options.delayTime,
                a = function e(n, a) {
                    n.forEach(function(e) {
                        e.isIntersecting && (t.options.onImagesLoaded ? t.$element.imagesLoaded(i <= 0 ? t._doInViewStuff.bind(t) : setTimeout(t._doInViewStuff.bind(t), i)) : i <= 0 ? t._doInViewStuff() : setTimeout(t._doInViewStuff(), i), a.unobserve(e.target))
                    })
                };
            new IntersectionObserver(a, {
                threshold: n
            }).observe(this.element)
        },
        _getThreshold: function e() {
            var t = window.innerWidth,
                n = this.$element.outerHeight();
            return Math.min(Math.max(t / n / 5, 0), 1)
        },
        _doInViewStuff: function e() {
            $(this.element).addClass("is-in-view")
        }
    }, $.fn[a] = function(e) {
        return this.each(function() {
            var t = $(this).data("inview-options") || e;
            $.data(this, "plugin_" + a) || $.data(this, "plugin_" + a, new i(this, t))
        })
    }
}(jQuery, window, document), jQuery(document).ready(function($) {
    $("[data-inview]").deeperInView()
});