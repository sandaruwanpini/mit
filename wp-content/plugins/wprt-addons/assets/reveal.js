"use strict";

! function($, e, t, n) {
    function i(e, t) {
        this.element = e, this.options = $.extend({}, s, t), this._defaults = s, this._name = a, this.init()
    }
    var a = "deeperReveal",
        s = {
            isContentHidden: !0,
            animteWhenInView: !0,
            delay: 0,
            revealSettings: {
                direction: "lr",
                bgcolor: "#dddddd",
                duration: 500,
                easing: "easeInOutQuint",
                coverArea: 0,
                onCover: function e(t, n) {
                    return !1
                },
                onStart: function e(t, n) {
                    return !1
                },
                onComplete: function e(t, n) {
                    return !1
                },
                onCoverAnimations: null
            }
        };
    i.prototype = {
        init: function e() {
            this._layout(),
            this.options.animteWhenInView ? this.setIntersectionObserver() : this.doTheReveal()
        },
        _createDOMEl: function e(n, i, a) {
            var s = t.createElement(n);
            return s.className = i || "", s.innerHTML = a || "", s
        },
        _layout: function e() {
            var t = getComputedStyle(this.element).position;
            "fixed" !== t && "absolute" !== t && "relative" !== t && (this.element.style.position = "relative"),
            this.content = this._createDOMEl("div", "block-revealer__content",
            this.element.innerHTML),
            this.options.isContentHidden && this.content.querySelector("figure") && (this.content.querySelector("figure").style.opacity = 0),
            this.revealer = this._createDOMEl("div", "block-revealer__element"),
            this.element.classList.add("block-revealer"),
            this.element.innerHTML = "",
            this.element.appendChild(this.content);
            this.element.appendChild(this.revealer);
        },
        _getTransformSettings: function e(t) {
            var n, i, a;
            switch (t) {
                case "lr":
                    n = "scaleX(0)", i = "0 50%", a = "100% 50%";
                    break;
                case "rl":
                    n = "scaleX(0)", i = "100% 50%", a = "0 50%";
                    break;
                case "tb":
                    n = "scaleY(0)", i = "50% 0", a = "50% 100%";
                    break;
                case "bt":
                    n = "scaleY(0)", i = "50% 100%", a = "50% 0";
                    break;
                default:
                    n = "scaleX(0)", i = "0 50%", a = "100% 50%";
                    break
            }
            return {
                val: n,
                origin: {
                    initial: i,
                    halfway: a
                }
            }
        },
        reveal: function e(t) {
            if (this.isAnimating) return !1;
            this.isAnimating = !0;
            var n = {
                    duration: 500,
                    easing: "easeInOutQuint",
                    delay: parseInt(this.options.delay, 10) || 0,
                    bgcolor: "#dddddd",
                    direction: "lr",
                    coverArea: 0
                },
                t = t || this.options.revealSettings,
                i = t.direction || n.direction,
                a = this._getTransformSettings(i);

            this.revealer.style.WebkitTransform = this.revealer.style.transform = a.val,
            this.revealer.style.WebkitTransformOrigin = this.revealer.style.transformOrigin = a.origin.initial,
            this.revealer.style.background = t.bgcolor || n.bgcolor, this.revealer.style.opacity = 1;
            var s = this,
                o = {
                    complete: function e() {
                        s.isAnimating = !1, 
                        "function" == typeof t.onComplete && t.onComplete(s.content, s.revealer),
                        $(s.element).addClass("revealing-ended").removeClass("revealing-started")
                    }
                },
                l = {
                    delay: t.delay || n.delay,
                    complete: function e() {
                        s.revealer.style.WebkitTransformOrigin = s.revealer.style.transformOrigin = a.origin.halfway,
                        "function" == typeof t.onCover && t.onCover(s.content, s.revealer),
                        $(s.element).addClass("element-uncovered"), anime(o)
                    }
                };
            l.targets = o.targets = this.revealer, l.duration = o.duration = t.duration || n.duration, l.easing = o.easing = t.easing || n.easing;
            var r = t.coverArea || n.coverArea;
            "lr" === i || "rl" === i ? (l.scaleX = [0, 1], o.scaleX = [1, r / 100]) : (l.scaleY = [0, 1], o.scaleY = [1, r / 100]), "function" == typeof t.onStart && t.onStart(s.content, s.revealer), $(s.element).addClass("revealing-started"), anime(l)
        },
        setIntersectionObserver: function e() {
            var t = this,
                n = t.element;
            t.isIntersected = !1;
            var i = function e(n, i) {
                n.forEach(function(e) {
                    e.isIntersecting && !t.isIntersected && (t.isIntersected = !0, t.doTheReveal())
                })
            };
            new IntersectionObserver(i, {
                threshold: .5
            }).observe(n)
        },
        doTheReveal: function t() {
            var n = this.options.revealSettings.onCoverAnimations,
                i = {
                    onCover: function t(i) {
                        if ($("figure", i).css("opacity", 1), n) {
                            var a = $.extend({}, {
                                targets: $("figure", i).get(0)
                            }, {
                                duration: 800,
                                easing: "easeInOutQuint"
                            }, n);
                            anime(a)
                        }
                    }
                },
                a = $.extend(this.options, i);
            this.reveal(a)
        },
    }, $.fn[a] = function(e) {
        return this.each(function() {
            var t = $(this).data("reveal-options"),
                n = null;
            t && (n = $.extend(!0, {}, e, t)), $.data(this, "plugin_" + a) || $.data(this, "plugin_" + a, new i(this, n))
        })
    }
}(jQuery, window, document), jQuery(document).ready(function($) {
    $("[data-reveal]").deeperReveal()
});