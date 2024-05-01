!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = e())
        : "function" == typeof define && define.amd
        ? define(e)
        : ((t =
              "undefined" != typeof globalThis ? globalThis : t || self).Trix =
              e());
})(this, function () {
    "use strict";
    var t = "2.0.8";
    const e = "[data-trix-attachment]",
        i = {
            preview: {
                presentation: "gallery",
                caption: { name: !0, size: !0 },
            },
            file: { caption: { size: !0 } },
        },
        n = {
            default: { tagName: "div", parse: !1 },
            quote: { tagName: "blockquote", nestable: !0 },
            heading1: {
                tagName: "h1",
                terminal: !0,
                breakOnReturn: !0,
                group: !1,
            },
            code: { tagName: "pre", terminal: !0, text: { plaintext: !0 } },
            bulletList: { tagName: "ul", parse: !1 },
            bullet: {
                tagName: "li",
                listAttribute: "bulletList",
                group: !1,
                nestable: !0,
                test(t) {
                    return r(t.parentNode) === n[this.listAttribute].tagName;
                },
            },
            numberList: { tagName: "ol", parse: !1 },
            number: {
                tagName: "li",
                listAttribute: "numberList",
                group: !1,
                nestable: !0,
                test(t) {
                    return r(t.parentNode) === n[this.listAttribute].tagName;
                },
            },
            attachmentGallery: {
                tagName: "div",
                exclusive: !0,
                terminal: !0,
                parse: !1,
                group: !1,
            },
        },
        r = (t) => {
            var e;
            return null == t || null === (e = t.tagName) || void 0 === e
                ? void 0
                : e.toLowerCase();
        },
        o = navigator.userAgent.match(/android\s([0-9]+.*Chrome)/i),
        s = o && parseInt(o[1]);
    var a = {
            composesExistingText: /Android.*Chrome/.test(navigator.userAgent),
            recentAndroid: s && s > 12,
            samsungAndroid: s && navigator.userAgent.match(/Android.*SM-/),
            forcesObjectResizing: /Trident.*rv:11/.test(navigator.userAgent),
            supportsInputEvents:
                "undefined" != typeof InputEvent &&
                ["data", "getTargetRanges", "inputType"].every(
                    (t) => t in InputEvent.prototype
                ),
        },
        l = {
            attachFiles: "Attach Files",
            bold: "Bold",
            bullets: "Bullets",
            byte: "Byte",
            bytes: "Bytes",
            captionPlaceholder: "Add a caption…",
            code: "Code",
            heading1: "Heading",
            indent: "Increase Level",
            italic: "Italic",
            link: "Link",
            numbers: "Numbers",
            outdent: "Decrease Level",
            quote: "Quote",
            redo: "Redo",
            remove: "Remove",
            strike: "Strikethrough",
            undo: "Undo",
            unlink: "Unlink",
            url: "URL",
            urlPlaceholder: "Enter a URL…",
            GB: "GB",
            KB: "KB",
            MB: "MB",
            PB: "PB",
            TB: "TB",
        };
    const c = [l.bytes, l.KB, l.MB, l.GB, l.TB, l.PB];
    var u = {
        prefix: "IEC",
        precision: 2,
        formatter(t) {
            switch (t) {
                case 0:
                    return "0 ".concat(l.bytes);
                case 1:
                    return "1 ".concat(l.byte);
                default:
                    let e;
                    "SI" === this.prefix
                        ? (e = 1e3)
                        : "IEC" === this.prefix && (e = 1024);
                    const i = Math.floor(Math.log(t) / Math.log(e)),
                        n = (t / Math.pow(e, i))
                            .toFixed(this.precision)
                            .replace(/0*$/, "")
                            .replace(/\.$/, "");
                    return "".concat(n, " ").concat(c[i]);
            }
        },
    };
    const h = "\ufeff",
        d = " ",
        g = function (t) {
            for (const e in t) {
                const i = t[e];
                this[e] = i;
            }
            return this;
        },
        m = document.documentElement,
        p = m.matches,
        f = function (t) {
            let {
                onElement: e,
                matchingSelector: i,
                withCallback: n,
                inPhase: r,
                preventDefault: o,
                times: s,
            } = arguments.length > 1 && void 0 !== arguments[1]
                ? arguments[1]
                : {};
            const a = e || m,
                l = i,
                c = "capturing" === r,
                u = function (t) {
                    null != s && 0 == --s && u.destroy();
                    const e = A(t.target, { matchingSelector: l });
                    null != e &&
                        (null == n || n.call(e, t, e), o && t.preventDefault());
                };
            return (
                (u.destroy = () => a.removeEventListener(t, u, c)),
                a.addEventListener(t, u, c),
                u
            );
        },
        b = function (t) {
            let {
                onElement: e,
                bubbles: i,
                cancelable: n,
                attributes: r,
            } = arguments.length > 1 && void 0 !== arguments[1]
                ? arguments[1]
                : {};
            const o = null != e ? e : m;
            (i = !1 !== i), (n = !1 !== n);
            const s = document.createEvent("Events");
            return (
                s.initEvent(t, i, n),
                null != r && g.call(s, r),
                o.dispatchEvent(s)
            );
        },
        v = function (t, e) {
            if (1 === (null == t ? void 0 : t.nodeType)) return p.call(t, e);
        },
        A = function (t) {
            let { matchingSelector: e, untilNode: i } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            for (; t && t.nodeType !== Node.ELEMENT_NODE; ) t = t.parentNode;
            if (null != t) {
                if (null == e) return t;
                if (t.closest && null == i) return t.closest(e);
                for (; t && t !== i; ) {
                    if (v(t, e)) return t;
                    t = t.parentNode;
                }
            }
        },
        x = (t) => document.activeElement !== t && y(t, document.activeElement),
        y = function (t, e) {
            if (t && e)
                for (; e; ) {
                    if (e === t) return !0;
                    e = e.parentNode;
                }
        },
        C = function (t) {
            var e;
            if (null === (e = t) || void 0 === e || !e.parentNode) return;
            let i = 0;
            for (t = t.previousSibling; t; ) i++, (t = t.previousSibling);
            return i;
        },
        R = (t) => {
            var e;
            return null == t || null === (e = t.parentNode) || void 0 === e
                ? void 0
                : e.removeChild(t);
        },
        S = function (t) {
            let {
                onlyNodesOfType: e,
                usingFilter: i,
                expandEntityReferences: n,
            } = arguments.length > 1 && void 0 !== arguments[1]
                ? arguments[1]
                : {};
            const r = (() => {
                switch (e) {
                    case "element":
                        return NodeFilter.SHOW_ELEMENT;
                    case "text":
                        return NodeFilter.SHOW_TEXT;
                    case "comment":
                        return NodeFilter.SHOW_COMMENT;
                    default:
                        return NodeFilter.SHOW_ALL;
                }
            })();
            return document.createTreeWalker(
                t,
                r,
                null != i ? i : null,
                !0 === n
            );
        },
        E = (t) => {
            var e;
            return null == t || null === (e = t.tagName) || void 0 === e
                ? void 0
                : e.toLowerCase();
        },
        k = function (t) {
            let e,
                i,
                n =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {};
            "object" == typeof t
                ? ((n = t), (t = n.tagName))
                : (n = { attributes: n });
            const r = document.createElement(t);
            if (
                (null != n.editable &&
                    (null == n.attributes && (n.attributes = {}),
                    (n.attributes.contenteditable = n.editable)),
                n.attributes)
            )
                for (e in n.attributes)
                    (i = n.attributes[e]), r.setAttribute(e, i);
            if (n.style) for (e in n.style) (i = n.style[e]), (r.style[e] = i);
            if (n.data) for (e in n.data) (i = n.data[e]), (r.dataset[e] = i);
            return (
                n.className &&
                    n.className.split(" ").forEach((t) => {
                        r.classList.add(t);
                    }),
                n.textContent && (r.textContent = n.textContent),
                n.childNodes &&
                    [].concat(n.childNodes).forEach((t) => {
                        r.appendChild(t);
                    }),
                r
            );
        };
    let L;
    const D = function () {
            if (null != L) return L;
            L = [];
            for (const t in n) {
                const e = n[t];
                e.tagName && L.push(e.tagName);
            }
            return L;
        },
        w = (t) => B(null == t ? void 0 : t.firstChild),
        T = function (t) {
            let { strict: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : { strict: !0 };
            return e
                ? B(t)
                : B(t) ||
                      (!B(t.firstChild) &&
                          (function (t) {
                              return (
                                  D().includes(E(t)) &&
                                  !D().includes(E(t.firstChild))
                              );
                          })(t));
        },
        B = (t) => F(t) && "block" === (null == t ? void 0 : t.data),
        F = (t) => (null == t ? void 0 : t.nodeType) === Node.COMMENT_NODE,
        I = function (t) {
            let { name: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            if (t)
                return O(t)
                    ? t.data === h
                        ? !e || t.parentNode.dataset.trixCursorTarget === e
                        : void 0
                    : I(t.firstChild);
        },
        P = (t) => v(t, e),
        N = (t) => O(t) && "" === (null == t ? void 0 : t.data),
        O = (t) => (null == t ? void 0 : t.nodeType) === Node.TEXT_NODE,
        M = {
            level2Enabled: !0,
            getLevel() {
                return this.level2Enabled && a.supportsInputEvents ? 2 : 0;
            },
            pickFiles(t) {
                const e = k("input", {
                    type: "file",
                    multiple: !0,
                    hidden: !0,
                    id: this.fileInputId,
                });
                e.addEventListener("change", () => {
                    t(e.files), R(e);
                }),
                    R(document.getElementById(this.fileInputId)),
                    document.body.appendChild(e),
                    e.click();
            },
        };
    var j = {
            removeBlankTableCells: !1,
            tableCellSeparator: " | ",
            tableRowSeparator: "\n",
        },
        W = {
            bold: {
                tagName: "strong",
                inheritable: !0,
                parser(t) {
                    const e = window.getComputedStyle(t);
                    return "bold" === e.fontWeight || e.fontWeight >= 600;
                },
            },
            italic: {
                tagName: "em",
                inheritable: !0,
                parser: (t) =>
                    "italic" === window.getComputedStyle(t).fontStyle,
            },
            href: {
                groupTagName: "a",
                parser(t) {
                    const i = "a:not(".concat(e, ")"),
                        n = t.closest(i);
                    if (n) return n.getAttribute("href");
                },
            },
            strike: { tagName: "del", inheritable: !0 },
            frozen: { style: { backgroundColor: "highlight" } },
        },
        U = {
            getDefaultHTML: () =>
                '<div class="trix-button-row">\n      <span class="trix-button-group trix-button-group--text-tools" data-trix-button-group="text-tools">\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-bold" data-trix-attribute="bold" data-trix-key="b" title="'
                    .concat(l.bold, '" tabindex="-1">')
                    .concat(
                        l.bold,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-italic" data-trix-attribute="italic" data-trix-key="i" title="'
                    )
                    .concat(l.italic, '" tabindex="-1">')
                    .concat(
                        l.italic,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-strike" data-trix-attribute="strike" title="'
                    )
                    .concat(l.strike, '" tabindex="-1">')
                    .concat(
                        l.strike,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-link" data-trix-attribute="href" data-trix-action="link" data-trix-key="k" title="'
                    )
                    .concat(l.link, '" tabindex="-1">')
                    .concat(
                        l.link,
                        '</button>\n      </span>\n\n      <span class="trix-button-group trix-button-group--block-tools" data-trix-button-group="block-tools">\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-heading-1" data-trix-attribute="heading1" title="'
                    )
                    .concat(l.heading1, '" tabindex="-1">')
                    .concat(
                        l.heading1,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-quote" data-trix-attribute="quote" title="'
                    )
                    .concat(l.quote, '" tabindex="-1">')
                    .concat(
                        l.quote,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-code" data-trix-attribute="code" title="'
                    )
                    .concat(l.code, '" tabindex="-1">')
                    .concat(
                        l.code,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-bullet-list" data-trix-attribute="bullet" title="'
                    )
                    .concat(l.bullets, '" tabindex="-1">')
                    .concat(
                        l.bullets,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-number-list" data-trix-attribute="number" title="'
                    )
                    .concat(l.numbers, '" tabindex="-1">')
                    .concat(
                        l.numbers,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-decrease-nesting-level" data-trix-action="decreaseNestingLevel" title="'
                    )
                    .concat(l.outdent, '" tabindex="-1">')
                    .concat(
                        l.outdent,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-increase-nesting-level" data-trix-action="increaseNestingLevel" title="'
                    )
                    .concat(l.indent, '" tabindex="-1">')
                    .concat(
                        l.indent,
                        '</button>\n      </span>\n\n      <span class="trix-button-group trix-button-group--file-tools" data-trix-button-group="file-tools">\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-attach" data-trix-action="attachFiles" title="'
                    )
                    .concat(l.attachFiles, '" tabindex="-1">')
                    .concat(
                        l.attachFiles,
                        '</button>\n      </span>\n\n      <span class="trix-button-group-spacer"></span>\n\n      <span class="trix-button-group trix-button-group--history-tools" data-trix-button-group="history-tools">\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-undo" data-trix-action="undo" data-trix-key="z" title="'
                    )
                    .concat(l.undo, '" tabindex="-1">')
                    .concat(
                        l.undo,
                        '</button>\n        <button type="button" class="trix-button trix-button--icon trix-button--icon-redo" data-trix-action="redo" data-trix-key="shift+z" title="'
                    )
                    .concat(l.redo, '" tabindex="-1">')
                    .concat(
                        l.redo,
                        '</button>\n      </span>\n    </div>\n\n    <div class="trix-dialogs" data-trix-dialogs>\n      <div class="trix-dialog trix-dialog--link" data-trix-dialog="href" data-trix-dialog-attribute="href">\n        <div class="trix-dialog__link-fields">\n          <input type="url" name="href" class="trix-input trix-input--dialog" placeholder="'
                    )
                    .concat(l.urlPlaceholder, '" aria-label="')
                    .concat(
                        l.url,
                        '" required data-trix-input>\n          <div class="trix-button-group">\n            <input type="button" class="trix-button trix-button--dialog" value="'
                    )
                    .concat(
                        l.link,
                        '" data-trix-method="setAttribute">\n            <input type="button" class="trix-button trix-button--dialog" value="'
                    )
                    .concat(
                        l.unlink,
                        '" data-trix-method="removeAttribute">\n          </div>\n        </div>\n      </div>\n    </div>'
                    ),
        };
    const q = { interval: 5e3 };
    var V = Object.freeze({
        __proto__: null,
        attachments: i,
        blockAttributes: n,
        browser: a,
        css: {
            attachment: "attachment",
            attachmentCaption: "attachment__caption",
            attachmentCaptionEditor: "attachment__caption-editor",
            attachmentMetadata: "attachment__metadata",
            attachmentMetadataContainer: "attachment__metadata-container",
            attachmentName: "attachment__name",
            attachmentProgress: "attachment__progress",
            attachmentSize: "attachment__size",
            attachmentToolbar: "attachment__toolbar",
            attachmentGallery: "attachment-gallery",
        },
        fileSize: u,
        input: M,
        keyNames: {
            8: "backspace",
            9: "tab",
            13: "return",
            27: "escape",
            37: "left",
            39: "right",
            46: "delete",
            68: "d",
            72: "h",
            79: "o",
        },
        lang: l,
        parser: j,
        textAttributes: W,
        toolbar: U,
        undo: q,
    });
    class z {
        static proxyMethod(t) {
            const { name: e, toMethod: i, toProperty: n, optional: r } = _(t);
            this.prototype[e] = function () {
                let t, o;
                var s, a;
                i
                    ? (o = r
                          ? null === (s = this[i]) || void 0 === s
                              ? void 0
                              : s.call(this)
                          : this[i]())
                    : n && (o = this[n]);
                return r
                    ? ((t = null === (a = o) || void 0 === a ? void 0 : a[e]),
                      t ? H.call(t, o, arguments) : void 0)
                    : ((t = o[e]), H.call(t, o, arguments));
            };
        }
    }
    const _ = function (t) {
            const e = t.match(J);
            if (!e)
                throw new Error(
                    "can't parse @proxyMethod expression: ".concat(t)
                );
            const i = { name: e[4] };
            return (
                null != e[2] ? (i.toMethod = e[1]) : (i.toProperty = e[1]),
                null != e[3] && (i.optional = !0),
                i
            );
        },
        { apply: H } = Function.prototype,
        J = new RegExp("^(.+?)(\\(\\))?(\\?)?\\.(.+?)$");
    var K, G, $;
    class X extends z {
        static box() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : "";
            return t instanceof this
                ? t
                : this.fromUCS2String(null == t ? void 0 : t.toString());
        }
        static fromUCS2String(t) {
            return new this(t, tt(t));
        }
        static fromCodepoints(t) {
            return new this(et(t), t);
        }
        constructor(t, e) {
            super(...arguments),
                (this.ucs2String = t),
                (this.codepoints = e),
                (this.length = this.codepoints.length),
                (this.ucs2Length = this.ucs2String.length);
        }
        offsetToUCS2Offset(t) {
            return et(this.codepoints.slice(0, Math.max(0, t))).length;
        }
        offsetFromUCS2Offset(t) {
            return tt(this.ucs2String.slice(0, Math.max(0, t))).length;
        }
        slice() {
            return this.constructor.fromCodepoints(
                this.codepoints.slice(...arguments)
            );
        }
        charAt(t) {
            return this.slice(t, t + 1);
        }
        isEqualTo(t) {
            return this.constructor.box(t).ucs2String === this.ucs2String;
        }
        toJSON() {
            return this.ucs2String;
        }
        getCacheKey() {
            return this.ucs2String;
        }
        toString() {
            return this.ucs2String;
        }
    }
    const Y =
            1 ===
            (null === (K = Array.from) || void 0 === K
                ? void 0
                : K.call(Array, "👼").length),
        Q =
            null !=
            (null === (G = " ".codePointAt) || void 0 === G
                ? void 0
                : G.call(" ", 0)),
        Z =
            " 👼" ===
            (null === ($ = String.fromCodePoint) || void 0 === $
                ? void 0
                : $.call(String, 32, 128124));
    let tt, et;
    (tt =
        Y && Q
            ? (t) => Array.from(t).map((t) => t.codePointAt(0))
            : function (t) {
                  const e = [];
                  let i = 0;
                  const { length: n } = t;
                  for (; i < n; ) {
                      let r = t.charCodeAt(i++);
                      if (55296 <= r && r <= 56319 && i < n) {
                          const e = t.charCodeAt(i++);
                          56320 == (64512 & e)
                              ? (r = ((1023 & r) << 10) + (1023 & e) + 65536)
                              : i--;
                      }
                      e.push(r);
                  }
                  return e;
              }),
        (et = Z
            ? (t) => String.fromCodePoint(...Array.from(t || []))
            : function (t) {
                  return (() => {
                      const e = [];
                      return (
                          Array.from(t).forEach((t) => {
                              let i = "";
                              t > 65535 &&
                                  ((t -= 65536),
                                  (i += String.fromCharCode(
                                      ((t >>> 10) & 1023) | 55296
                                  )),
                                  (t = 56320 | (1023 & t))),
                                  e.push(i + String.fromCharCode(t));
                          }),
                          e
                      );
                  })().join("");
              });
    let it = 0;
    class nt extends z {
        static fromJSONString(t) {
            return this.fromJSON(JSON.parse(t));
        }
        constructor() {
            super(...arguments), (this.id = ++it);
        }
        hasSameConstructorAs(t) {
            return this.constructor === (null == t ? void 0 : t.constructor);
        }
        isEqualTo(t) {
            return this === t;
        }
        inspect() {
            const t = [],
                e = this.contentsForInspection() || {};
            for (const i in e) {
                const n = e[i];
                t.push("".concat(i, "=").concat(n));
            }
            return "#<"
                .concat(this.constructor.name, ":")
                .concat(this.id)
                .concat(t.length ? " ".concat(t.join(", ")) : "", ">");
        }
        contentsForInspection() {}
        toJSONString() {
            return JSON.stringify(this);
        }
        toUTF16String() {
            return X.box(this);
        }
        getCacheKey() {
            return this.id.toString();
        }
    }
    const rt = function () {
            let t =
                    arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : [],
                e =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : [];
            if (t.length !== e.length) return !1;
            for (let i = 0; i < t.length; i++) {
                if (t[i] !== e[i]) return !1;
            }
            return !0;
        },
        ot = function (t) {
            const e = t.slice(0);
            for (
                var i = arguments.length,
                    n = new Array(i > 1 ? i - 1 : 0),
                    r = 1;
                r < i;
                r++
            )
                n[r - 1] = arguments[r];
            return e.splice(...n), e;
        },
        st =
            /[\u05BE\u05C0\u05C3\u05D0-\u05EA\u05F0-\u05F4\u061B\u061F\u0621-\u063A\u0640-\u064A\u066D\u0671-\u06B7\u06BA-\u06BE\u06C0-\u06CE\u06D0-\u06D5\u06E5\u06E6\u200F\u202B\u202E\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE72\uFE74\uFE76-\uFEFC]/,
        at = (function () {
            const t = k("input", { dir: "auto", name: "x", dirName: "x.dir" }),
                e = k("textarea", { dir: "auto", name: "y", dirName: "y.dir" }),
                i = k("form");
            i.appendChild(t), i.appendChild(e);
            const n = (function () {
                    try {
                        return new FormData(i).has(e.dirName);
                    } catch (t) {
                        return !1;
                    }
                })(),
                r = (function () {
                    try {
                        return t.matches(":dir(ltr),:dir(rtl)");
                    } catch (t) {
                        return !1;
                    }
                })();
            return n
                ? function (t) {
                      return (e.value = t), new FormData(i).get(e.dirName);
                  }
                : r
                ? function (e) {
                      return (
                          (t.value = e), t.matches(":dir(rtl)") ? "rtl" : "ltr"
                      );
                  }
                : function (t) {
                      const e = t.trim().charAt(0);
                      return st.test(e) ? "rtl" : "ltr";
                  };
        })();
    let lt = null,
        ct = null,
        ut = null,
        ht = null;
    const dt = () => (lt || (lt = ft().concat(mt())), lt),
        gt = (t) => n[t],
        mt = () => (ct || (ct = Object.keys(n)), ct),
        pt = (t) => W[t],
        ft = () => (ut || (ut = Object.keys(W)), ut),
        bt = function (t, e) {
            vt(t).textContent = e.replace(/%t/g, t);
        },
        vt = function (t) {
            const e = document.createElement("style");
            e.setAttribute("type", "text/css"),
                e.setAttribute("data-tag-name", t.toLowerCase());
            const i = At();
            return (
                i && e.setAttribute("nonce", i),
                document.head.insertBefore(e, document.head.firstChild),
                e
            );
        },
        At = function () {
            const t = xt("trix-csp-nonce") || xt("csp-nonce");
            if (t) return t.getAttribute("content");
        },
        xt = (t) => document.head.querySelector("meta[name=".concat(t, "]")),
        yt = { "application/x-trix-feature-detection": "test" },
        Ct = function (t) {
            const e = t.getData("text/plain"),
                i = t.getData("text/html");
            if (!e || !i) return null == e ? void 0 : e.length;
            {
                const { body: t } = new DOMParser().parseFromString(
                    i,
                    "text/html"
                );
                if (t.textContent === e) return !t.querySelector("*");
            }
        },
        Rt = /Mac|^iP/.test(navigator.platform)
            ? (t) => t.metaKey
            : (t) => t.ctrlKey,
        St = (t) => setTimeout(t, 1),
        Et = function () {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            const e = {};
            for (const i in t) {
                const n = t[i];
                e[i] = n;
            }
            return e;
        },
        kt = function () {
            let t =
                    arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : {},
                e =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {};
            if (Object.keys(t).length !== Object.keys(e).length) return !1;
            for (const i in t) {
                if (t[i] !== e[i]) return !1;
            }
            return !0;
        },
        Lt = function (t) {
            if (null != t)
                return (
                    Array.isArray(t) || (t = [t, t]),
                    [Tt(t[0]), Tt(null != t[1] ? t[1] : t[0])]
                );
        },
        Dt = function (t) {
            if (null == t) return;
            const [e, i] = Lt(t);
            return Bt(e, i);
        },
        wt = function (t, e) {
            if (null == t || null == e) return;
            const [i, n] = Lt(t),
                [r, o] = Lt(e);
            return Bt(i, r) && Bt(n, o);
        },
        Tt = function (t) {
            return "number" == typeof t ? t : Et(t);
        },
        Bt = function (t, e) {
            return "number" == typeof t ? t === e : kt(t, e);
        };
    class Ft extends z {
        constructor() {
            super(...arguments),
                (this.update = this.update.bind(this)),
                (this.selectionManagers = []);
        }
        start() {
            this.started ||
                ((this.started = !0),
                document.addEventListener("selectionchange", this.update, !0));
        }
        stop() {
            if (this.started)
                return (
                    (this.started = !1),
                    document.removeEventListener(
                        "selectionchange",
                        this.update,
                        !0
                    )
                );
        }
        registerSelectionManager(t) {
            if (!this.selectionManagers.includes(t))
                return this.selectionManagers.push(t), this.start();
        }
        unregisterSelectionManager(t) {
            if (
                ((this.selectionManagers = this.selectionManagers.filter(
                    (e) => e !== t
                )),
                0 === this.selectionManagers.length)
            )
                return this.stop();
        }
        notifySelectionManagersOfSelectionChange() {
            return this.selectionManagers.map((t) => t.selectionDidChange());
        }
        update() {
            this.notifySelectionManagersOfSelectionChange();
        }
        reset() {
            this.update();
        }
    }
    const It = new Ft(),
        Pt = function () {
            const t = window.getSelection();
            if (t.rangeCount > 0) return t;
        },
        Nt = function () {
            var t;
            const e =
                null === (t = Pt()) || void 0 === t ? void 0 : t.getRangeAt(0);
            if (e && !Mt(e)) return e;
        },
        Ot = function (t) {
            const e = window.getSelection();
            return e.removeAllRanges(), e.addRange(t), It.update();
        },
        Mt = (t) => jt(t.startContainer) || jt(t.endContainer),
        jt = (t) => !Object.getPrototypeOf(t),
        Wt = (t) =>
            t
                .replace(new RegExp("".concat(h), "g"), "")
                .replace(new RegExp("".concat(d), "g"), " "),
        Ut = new RegExp("[^\\S".concat(d, "]")),
        qt = (t) =>
            t
                .replace(new RegExp("".concat(Ut.source), "g"), " ")
                .replace(/\ {2,}/g, " "),
        Vt = function (t, e) {
            if (t.isEqualTo(e)) return ["", ""];
            const i = zt(t, e),
                { length: n } = i.utf16String;
            let r;
            if (n) {
                const { offset: o } = i,
                    s = t.codepoints
                        .slice(0, o)
                        .concat(t.codepoints.slice(o + n));
                r = zt(e, X.fromCodepoints(s));
            } else r = zt(e, t);
            return [i.utf16String.toString(), r.utf16String.toString()];
        },
        zt = function (t, e) {
            let i = 0,
                n = t.length,
                r = e.length;
            for (; i < n && t.charAt(i).isEqualTo(e.charAt(i)); ) i++;
            for (; n > i + 1 && t.charAt(n - 1).isEqualTo(e.charAt(r - 1)); )
                n--, r--;
            return { utf16String: t.slice(i, n), offset: i };
        };
    class _t extends nt {
        static fromCommonAttributesOfObjects() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            if (!t.length) return new this();
            let e = Gt(t[0]),
                i = e.getKeys();
            return (
                t.slice(1).forEach((t) => {
                    (i = e.getKeysCommonToHash(Gt(t))), (e = e.slice(i));
                }),
                e
            );
        }
        static box(t) {
            return Gt(t);
        }
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            super(...arguments), (this.values = Kt(t));
        }
        add(t, e) {
            return this.merge(Ht(t, e));
        }
        remove(t) {
            return new _t(Kt(this.values, t));
        }
        get(t) {
            return this.values[t];
        }
        has(t) {
            return t in this.values;
        }
        merge(t) {
            return new _t(Jt(this.values, $t(t)));
        }
        slice(t) {
            const e = {};
            return (
                Array.from(t).forEach((t) => {
                    this.has(t) && (e[t] = this.values[t]);
                }),
                new _t(e)
            );
        }
        getKeys() {
            return Object.keys(this.values);
        }
        getKeysCommonToHash(t) {
            return (
                (t = Gt(t)),
                this.getKeys().filter((e) => this.values[e] === t.values[e])
            );
        }
        isEqualTo(t) {
            return rt(this.toArray(), Gt(t).toArray());
        }
        isEmpty() {
            return 0 === this.getKeys().length;
        }
        toArray() {
            if (!this.array) {
                const t = [];
                for (const e in this.values) {
                    const i = this.values[e];
                    t.push(t.push(e, i));
                }
                this.array = t.slice(0);
            }
            return this.array;
        }
        toObject() {
            return Kt(this.values);
        }
        toJSON() {
            return this.toObject();
        }
        contentsForInspection() {
            return { values: JSON.stringify(this.values) };
        }
    }
    const Ht = function (t, e) {
            const i = {};
            return (i[t] = e), i;
        },
        Jt = function (t, e) {
            const i = Kt(t);
            for (const t in e) {
                const n = e[t];
                i[t] = n;
            }
            return i;
        },
        Kt = function (t, e) {
            const i = {};
            return (
                Object.keys(t)
                    .sort()
                    .forEach((n) => {
                        n !== e && (i[n] = t[n]);
                    }),
                i
            );
        },
        Gt = function (t) {
            return t instanceof _t ? t : new _t(t);
        },
        $t = function (t) {
            return t instanceof _t ? t.values : t;
        };
    class Xt {
        static groupObjects() {
            let t,
                e =
                    arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : [],
                { depth: i, asTree: n } =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {};
            n && null == i && (i = 0);
            const r = [];
            return (
                Array.from(e).forEach((e) => {
                    var o;
                    if (t) {
                        var s, a, l;
                        if (
                            null !== (s = e.canBeGrouped) &&
                            void 0 !== s &&
                            s.call(e, i) &&
                            null !==
                                (a = (l = t[t.length - 1]).canBeGroupedWith) &&
                            void 0 !== a &&
                            a.call(l, e, i)
                        )
                            return void t.push(e);
                        r.push(new this(t, { depth: i, asTree: n })),
                            (t = null);
                    }
                    null !== (o = e.canBeGrouped) &&
                    void 0 !== o &&
                    o.call(e, i)
                        ? (t = [e])
                        : r.push(e);
                }),
                t && r.push(new this(t, { depth: i, asTree: n })),
                r
            );
        }
        constructor() {
            let t =
                    arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : [],
                { depth: e, asTree: i } =
                    arguments.length > 1 ? arguments[1] : void 0;
            (this.objects = t),
                i &&
                    ((this.depth = e),
                    (this.objects = this.constructor.groupObjects(
                        this.objects,
                        { asTree: i, depth: this.depth + 1 }
                    )));
        }
        getObjects() {
            return this.objects;
        }
        getDepth() {
            return this.depth;
        }
        getCacheKey() {
            const t = ["objectGroup"];
            return (
                Array.from(this.getObjects()).forEach((e) => {
                    t.push(e.getCacheKey());
                }),
                t.join("/")
            );
        }
    }
    class Yt extends z {
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            super(...arguments),
                (this.objects = {}),
                Array.from(t).forEach((t) => {
                    const e = JSON.stringify(t);
                    null == this.objects[e] && (this.objects[e] = t);
                });
        }
        find(t) {
            const e = JSON.stringify(t);
            return this.objects[e];
        }
    }
    class Qt {
        constructor(t) {
            this.reset(t);
        }
        add(t) {
            const e = Zt(t);
            this.elements[e] = t;
        }
        remove(t) {
            const e = Zt(t),
                i = this.elements[e];
            if (i) return delete this.elements[e], i;
        }
        reset() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            return (
                (this.elements = {}),
                Array.from(t).forEach((t) => {
                    this.add(t);
                }),
                t
            );
        }
    }
    const Zt = (t) => t.dataset.trixStoreKey;
    class te extends z {
        isPerforming() {
            return !0 === this.performing;
        }
        hasPerformed() {
            return !0 === this.performed;
        }
        hasSucceeded() {
            return this.performed && this.succeeded;
        }
        hasFailed() {
            return this.performed && !this.succeeded;
        }
        getPromise() {
            return (
                this.promise ||
                    (this.promise = new Promise(
                        (t, e) => (
                            (this.performing = !0),
                            this.perform((i, n) => {
                                (this.succeeded = i),
                                    (this.performing = !1),
                                    (this.performed = !0),
                                    this.succeeded ? t(n) : e(n);
                            })
                        )
                    )),
                this.promise
            );
        }
        perform(t) {
            return t(!1);
        }
        release() {
            var t, e;
            null === (t = this.promise) ||
                void 0 === t ||
                null === (e = t.cancel) ||
                void 0 === e ||
                e.call(t),
                (this.promise = null),
                (this.performing = null),
                (this.performed = null),
                (this.succeeded = null);
        }
    }
    te.proxyMethod("getPromise().then"), te.proxyMethod("getPromise().catch");
    class ee extends z {
        constructor(t) {
            let e =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            super(...arguments),
                (this.object = t),
                (this.options = e),
                (this.childViews = []),
                (this.rootView = this);
        }
        getNodes() {
            return (
                this.nodes || (this.nodes = this.createNodes()),
                this.nodes.map((t) => t.cloneNode(!0))
            );
        }
        invalidate() {
            var t;
            return (
                (this.nodes = null),
                (this.childViews = []),
                null === (t = this.parentView) || void 0 === t
                    ? void 0
                    : t.invalidate()
            );
        }
        invalidateViewForObject(t) {
            var e;
            return null === (e = this.findViewForObject(t)) || void 0 === e
                ? void 0
                : e.invalidate();
        }
        findOrCreateCachedChildView(t, e, i) {
            let n = this.getCachedViewForObject(e);
            return (
                n
                    ? this.recordChildView(n)
                    : ((n = this.createChildView(...arguments)),
                      this.cacheViewForObject(n, e)),
                n
            );
        }
        createChildView(t, e) {
            let i =
                arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : {};
            e instanceof Xt && ((i.viewClass = t), (t = ie));
            const n = new t(e, i);
            return this.recordChildView(n);
        }
        recordChildView(t) {
            return (
                (t.parentView = this),
                (t.rootView = this.rootView),
                this.childViews.push(t),
                t
            );
        }
        getAllChildViews() {
            let t = [];
            return (
                this.childViews.forEach((e) => {
                    t.push(e), (t = t.concat(e.getAllChildViews()));
                }),
                t
            );
        }
        findElement() {
            return this.findElementForObject(this.object);
        }
        findElementForObject(t) {
            const e = null == t ? void 0 : t.id;
            if (e)
                return this.rootView.element.querySelector(
                    "[data-trix-id='".concat(e, "']")
                );
        }
        findViewForObject(t) {
            for (const e of this.getAllChildViews())
                if (e.object === t) return e;
        }
        getViewCache() {
            return this.rootView !== this
                ? this.rootView.getViewCache()
                : this.isViewCachingEnabled()
                ? (this.viewCache || (this.viewCache = {}), this.viewCache)
                : void 0;
        }
        isViewCachingEnabled() {
            return !1 !== this.shouldCacheViews;
        }
        enableViewCaching() {
            this.shouldCacheViews = !0;
        }
        disableViewCaching() {
            this.shouldCacheViews = !1;
        }
        getCachedViewForObject(t) {
            var e;
            return null === (e = this.getViewCache()) || void 0 === e
                ? void 0
                : e[t.getCacheKey()];
        }
        cacheViewForObject(t, e) {
            const i = this.getViewCache();
            i && (i[e.getCacheKey()] = t);
        }
        garbageCollectCachedViews() {
            const t = this.getViewCache();
            if (t) {
                const e = this.getAllChildViews()
                    .concat(this)
                    .map((t) => t.object.getCacheKey());
                for (const i in t) e.includes(i) || delete t[i];
            }
        }
    }
    class ie extends ee {
        constructor() {
            super(...arguments),
                (this.objectGroup = this.object),
                (this.viewClass = this.options.viewClass),
                delete this.options.viewClass;
        }
        getChildViews() {
            return (
                this.childViews.length ||
                    Array.from(this.objectGroup.getObjects()).forEach((t) => {
                        this.findOrCreateCachedChildView(
                            this.viewClass,
                            t,
                            this.options
                        );
                    }),
                this.childViews
            );
        }
        createNodes() {
            const t = this.createContainerElement();
            return (
                this.getChildViews().forEach((e) => {
                    Array.from(e.getNodes()).forEach((e) => {
                        t.appendChild(e);
                    });
                }),
                [t]
            );
        }
        createContainerElement() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : this.objectGroup.getDepth();
            return this.getChildViews()[0].createContainerElement(t);
        }
    }
    const { css: ne } = V;
    class re extends ee {
        constructor() {
            super(...arguments),
                (this.attachment = this.object),
                (this.attachment.uploadProgressDelegate = this),
                (this.attachmentPiece = this.options.piece);
        }
        createContentNodes() {
            return [];
        }
        createNodes() {
            let t;
            const e = (t = k({
                    tagName: "figure",
                    className: this.getClassName(),
                    data: this.getData(),
                    editable: !1,
                })),
                i = this.getHref();
            return (
                i &&
                    ((t = k({
                        tagName: "a",
                        editable: !1,
                        attributes: { href: i, tabindex: -1 },
                    })),
                    e.appendChild(t)),
                this.attachment.hasContent()
                    ? (t.innerHTML = this.attachment.getContent())
                    : this.createContentNodes().forEach((e) => {
                          t.appendChild(e);
                      }),
                t.appendChild(this.createCaptionElement()),
                this.attachment.isPending() &&
                    ((this.progressElement = k({
                        tagName: "progress",
                        attributes: {
                            class: ne.attachmentProgress,
                            value: this.attachment.getUploadProgress(),
                            max: 100,
                        },
                        data: {
                            trixMutable: !0,
                            trixStoreKey: [
                                "progressElement",
                                this.attachment.id,
                            ].join("/"),
                        },
                    })),
                    e.appendChild(this.progressElement)),
                [oe("left"), e, oe("right")]
            );
        }
        createCaptionElement() {
            const t = k({
                    tagName: "figcaption",
                    className: ne.attachmentCaption,
                }),
                e = this.attachmentPiece.getCaption();
            if (e)
                t.classList.add("".concat(ne.attachmentCaption, "--edited")),
                    (t.textContent = e);
            else {
                let e, i;
                const n = this.getCaptionConfig();
                if (
                    (n.name && (e = this.attachment.getFilename()),
                    n.size && (i = this.attachment.getFormattedFilesize()),
                    e)
                ) {
                    const i = k({
                        tagName: "span",
                        className: ne.attachmentName,
                        textContent: e,
                    });
                    t.appendChild(i);
                }
                if (i) {
                    e && t.appendChild(document.createTextNode(" "));
                    const n = k({
                        tagName: "span",
                        className: ne.attachmentSize,
                        textContent: i,
                    });
                    t.appendChild(n);
                }
            }
            return t;
        }
        getClassName() {
            const t = [
                    ne.attachment,
                    ""
                        .concat(ne.attachment, "--")
                        .concat(this.attachment.getType()),
                ],
                e = this.attachment.getExtension();
            return (
                e && t.push("".concat(ne.attachment, "--").concat(e)),
                t.join(" ")
            );
        }
        getData() {
            const t = {
                    trixAttachment: JSON.stringify(this.attachment),
                    trixContentType: this.attachment.getContentType(),
                    trixId: this.attachment.id,
                },
                { attributes: e } = this.attachmentPiece;
            return (
                e.isEmpty() || (t.trixAttributes = JSON.stringify(e)),
                this.attachment.isPending() && (t.trixSerialize = !1),
                t
            );
        }
        getHref() {
            if (!se(this.attachment.getContent(), "a"))
                return this.attachment.getHref();
        }
        getCaptionConfig() {
            var t;
            const e = this.attachment.getType(),
                n = Et(
                    null === (t = i[e]) || void 0 === t ? void 0 : t.caption
                );
            return "file" === e && (n.name = !0), n;
        }
        findProgressElement() {
            var t;
            return null === (t = this.findElement()) || void 0 === t
                ? void 0
                : t.querySelector("progress");
        }
        attachmentDidChangeUploadProgress() {
            const t = this.attachment.getUploadProgress(),
                e = this.findProgressElement();
            e && (e.value = t);
        }
    }
    const oe = (t) =>
            k({
                tagName: "span",
                textContent: h,
                data: { trixCursorTarget: t, trixSerialize: !1 },
            }),
        se = function (t, e) {
            const i = k("div");
            return (i.innerHTML = t || ""), i.querySelector(e);
        };
    class ae extends re {
        constructor() {
            super(...arguments), (this.attachment.previewDelegate = this);
        }
        createContentNodes() {
            return (
                (this.image = k({
                    tagName: "img",
                    attributes: { src: "" },
                    data: { trixMutable: !0 },
                })),
                this.refresh(this.image),
                [this.image]
            );
        }
        createCaptionElement() {
            const t = super.createCaptionElement(...arguments);
            return (
                t.textContent ||
                    t.setAttribute(
                        "data-trix-placeholder",
                        l.captionPlaceholder
                    ),
                t
            );
        }
        refresh(t) {
            var e;
            t ||
                (t =
                    null === (e = this.findElement()) || void 0 === e
                        ? void 0
                        : e.querySelector("img"));
            if (t) return this.updateAttributesForImage(t);
        }
        updateAttributesForImage(t) {
            const e = this.attachment.getURL(),
                i = this.attachment.getPreviewURL();
            if (((t.src = i || e), i === e))
                t.removeAttribute("data-trix-serialized-attributes");
            else {
                const i = JSON.stringify({ src: e });
                t.setAttribute("data-trix-serialized-attributes", i);
            }
            const n = this.attachment.getWidth(),
                r = this.attachment.getHeight();
            null != n && (t.width = n), null != r && (t.height = r);
            const o = [
                "imageElement",
                this.attachment.id,
                t.src,
                t.width,
                t.height,
            ].join("/");
            t.dataset.trixStoreKey = o;
        }
        attachmentDidChangeAttributes() {
            return this.refresh(this.image), this.refresh();
        }
    }
    class le extends ee {
        constructor() {
            super(...arguments),
                (this.piece = this.object),
                (this.attributes = this.piece.getAttributes()),
                (this.textConfig = this.options.textConfig),
                (this.context = this.options.context),
                this.piece.attachment
                    ? (this.attachment = this.piece.attachment)
                    : (this.string = this.piece.toString());
        }
        createNodes() {
            let t = this.attachment
                ? this.createAttachmentNodes()
                : this.createStringNodes();
            const e = this.createElement();
            if (e) {
                const i = (function (t) {
                    for (
                        ;
                        null !== (e = t) && void 0 !== e && e.firstElementChild;

                    ) {
                        var e;
                        t = t.firstElementChild;
                    }
                    return t;
                })(e);
                Array.from(t).forEach((t) => {
                    i.appendChild(t);
                }),
                    (t = [e]);
            }
            return t;
        }
        createAttachmentNodes() {
            const t = this.attachment.isPreviewable() ? ae : re;
            return this.createChildView(t, this.piece.attachment, {
                piece: this.piece,
            }).getNodes();
        }
        createStringNodes() {
            var t;
            if (null !== (t = this.textConfig) && void 0 !== t && t.plaintext)
                return [document.createTextNode(this.string)];
            {
                const t = [],
                    e = this.string.split("\n");
                for (let i = 0; i < e.length; i++) {
                    const n = e[i];
                    if (i > 0) {
                        const e = k("br");
                        t.push(e);
                    }
                    if (n.length) {
                        const e = document.createTextNode(
                            this.preserveSpaces(n)
                        );
                        t.push(e);
                    }
                }
                return t;
            }
        }
        createElement() {
            let t, e, i;
            const n = {};
            for (e in this.attributes) {
                i = this.attributes[e];
                const o = pt(e);
                if (o) {
                    if (o.tagName) {
                        var r;
                        const e = k(o.tagName);
                        r ? (r.appendChild(e), (r = e)) : (t = r = e);
                    }
                    if ((o.styleProperty && (n[o.styleProperty] = i), o.style))
                        for (e in o.style) (i = o.style[e]), (n[e] = i);
                }
            }
            if (Object.keys(n).length)
                for (e in (t || (t = k("span")), n))
                    (i = n[e]), (t.style[e] = i);
            return t;
        }
        createContainerElement() {
            for (const t in this.attributes) {
                const e = this.attributes[t],
                    i = pt(t);
                if (i && i.groupTagName) {
                    const n = {};
                    return (n[t] = e), k(i.groupTagName, n);
                }
            }
        }
        preserveSpaces(t) {
            return (
                this.context.isLast && (t = t.replace(/\ $/, d)),
                (t = t
                    .replace(/(\S)\ {3}(\S)/g, "$1 ".concat(d, " $2"))
                    .replace(/\ {2}/g, "".concat(d, " "))
                    .replace(/\ {2}/g, " ".concat(d))),
                (this.context.isFirst || this.context.followsWhitespace) &&
                    (t = t.replace(/^\ /, d)),
                t
            );
        }
    }
    class ce extends ee {
        constructor() {
            super(...arguments),
                (this.text = this.object),
                (this.textConfig = this.options.textConfig);
        }
        createNodes() {
            const t = [],
                e = Xt.groupObjects(this.getPieces()),
                i = e.length - 1;
            for (let r = 0; r < e.length; r++) {
                const o = e[r],
                    s = {};
                0 === r && (s.isFirst = !0),
                    r === i && (s.isLast = !0),
                    ue(n) && (s.followsWhitespace = !0);
                const a = this.findOrCreateCachedChildView(le, o, {
                    textConfig: this.textConfig,
                    context: s,
                });
                t.push(...Array.from(a.getNodes() || []));
                var n = o;
            }
            return t;
        }
        getPieces() {
            return Array.from(this.text.getPieces()).filter(
                (t) => !t.hasAttribute("blockBreak")
            );
        }
    }
    const ue = (t) => /\s$/.test(null == t ? void 0 : t.toString()),
        { css: he } = V;
    class de extends ee {
        constructor() {
            super(...arguments),
                (this.block = this.object),
                (this.attributes = this.block.getAttributes());
        }
        createNodes() {
            const t = [document.createComment("block")];
            if (this.block.isEmpty()) t.push(k("br"));
            else {
                var e;
                const i =
                        null === (e = gt(this.block.getLastAttribute())) ||
                        void 0 === e
                            ? void 0
                            : e.text,
                    n = this.findOrCreateCachedChildView(ce, this.block.text, {
                        textConfig: i,
                    });
                t.push(...Array.from(n.getNodes() || [])),
                    this.shouldAddExtraNewlineElement() && t.push(k("br"));
            }
            if (this.attributes.length) return t;
            {
                let e;
                const { tagName: i } = n.default;
                this.block.isRTL() && (e = { dir: "rtl" });
                const r = k({ tagName: i, attributes: e });
                return t.forEach((t) => r.appendChild(t)), [r];
            }
        }
        createContainerElement(t) {
            let e, i;
            const n = this.attributes[t],
                { tagName: r } = gt(n);
            if (
                (0 === t && this.block.isRTL() && (e = { dir: "rtl" }),
                "attachmentGallery" === n)
            ) {
                const t = this.block.getBlockBreakPosition();
                i = ""
                    .concat(he.attachmentGallery, " ")
                    .concat(he.attachmentGallery, "--")
                    .concat(t);
            }
            return k({ tagName: r, className: i, attributes: e });
        }
        shouldAddExtraNewlineElement() {
            return /\n\n$/.test(this.block.toString());
        }
    }
    class ge extends ee {
        static render(t) {
            const e = k("div"),
                i = new this(t, { element: e });
            return i.render(), i.sync(), e;
        }
        constructor() {
            super(...arguments),
                (this.element = this.options.element),
                (this.elementStore = new Qt()),
                this.setDocument(this.object);
        }
        setDocument(t) {
            t.isEqualTo(this.document) || (this.document = this.object = t);
        }
        render() {
            if (
                ((this.childViews = []),
                (this.shadowElement = k("div")),
                !this.document.isEmpty())
            ) {
                const t = Xt.groupObjects(this.document.getBlocks(), {
                    asTree: !0,
                });
                Array.from(t).forEach((t) => {
                    const e = this.findOrCreateCachedChildView(de, t);
                    Array.from(e.getNodes()).map((t) =>
                        this.shadowElement.appendChild(t)
                    );
                });
            }
        }
        isSynced() {
            return pe(this.shadowElement, this.element);
        }
        sync() {
            const t = this.createDocumentFragmentForSync();
            for (; this.element.lastChild; )
                this.element.removeChild(this.element.lastChild);
            return this.element.appendChild(t), this.didSync();
        }
        didSync() {
            return (
                this.elementStore.reset(me(this.element)),
                St(() => this.garbageCollectCachedViews())
            );
        }
        createDocumentFragmentForSync() {
            const t = document.createDocumentFragment();
            return (
                Array.from(this.shadowElement.childNodes).forEach((e) => {
                    t.appendChild(e.cloneNode(!0));
                }),
                Array.from(me(t)).forEach((t) => {
                    const e = this.elementStore.remove(t);
                    e && t.parentNode.replaceChild(e, t);
                }),
                t
            );
        }
    }
    const me = (t) => t.querySelectorAll("[data-trix-store-key]"),
        pe = (t, e) => fe(t.innerHTML) === fe(e.innerHTML),
        fe = (t) => t.replace(/&nbsp;/g, " ");
    function be(t) {
        var e, i;
        function n(e, i) {
            try {
                var o = t[e](i),
                    s = o.value,
                    a = s instanceof ve;
                Promise.resolve(a ? s.v : s).then(
                    function (i) {
                        if (a) {
                            var l = "return" === e ? "return" : "next";
                            if (!s.k || i.done) return n(l, i);
                            i = t[l](i).value;
                        }
                        r(o.done ? "return" : "normal", i);
                    },
                    function (t) {
                        n("throw", t);
                    }
                );
            } catch (t) {
                r("throw", t);
            }
        }
        function r(t, r) {
            switch (t) {
                case "return":
                    e.resolve({ value: r, done: !0 });
                    break;
                case "throw":
                    e.reject(r);
                    break;
                default:
                    e.resolve({ value: r, done: !1 });
            }
            (e = e.next) ? n(e.key, e.arg) : (i = null);
        }
        (this._invoke = function (t, r) {
            return new Promise(function (o, s) {
                var a = { key: t, arg: r, resolve: o, reject: s, next: null };
                i ? (i = i.next = a) : ((e = i = a), n(t, r));
            });
        }),
            "function" != typeof t.return && (this.return = void 0);
    }
    function ve(t, e) {
        (this.v = t), (this.k = e);
    }
    function Ae(t, e, i) {
        return (
            (e = xe(e)) in t
                ? Object.defineProperty(t, e, {
                      value: i,
                      enumerable: !0,
                      configurable: !0,
                      writable: !0,
                  })
                : (t[e] = i),
            t
        );
    }
    function xe(t) {
        var e = (function (t, e) {
            if ("object" != typeof t || null === t) return t;
            var i = t[Symbol.toPrimitive];
            if (void 0 !== i) {
                var n = i.call(t, e || "default");
                if ("object" != typeof n) return n;
                throw new TypeError(
                    "@@toPrimitive must return a primitive value."
                );
            }
            return ("string" === e ? String : Number)(t);
        })(t, "string");
        return "symbol" == typeof e ? e : String(e);
    }
    (be.prototype[
        ("function" == typeof Symbol && Symbol.asyncIterator) ||
            "@@asyncIterator"
    ] = function () {
        return this;
    }),
        (be.prototype.next = function (t) {
            return this._invoke("next", t);
        }),
        (be.prototype.throw = function (t) {
            return this._invoke("throw", t);
        }),
        (be.prototype.return = function (t) {
            return this._invoke("return", t);
        });
    class ye extends nt {
        static registerType(t, e) {
            (e.type = t), (this.types[t] = e);
        }
        static fromJSON(t) {
            const e = this.types[t.type];
            if (e) return e.fromJSON(t);
        }
        constructor(t) {
            let e =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            super(...arguments), (this.attributes = _t.box(e));
        }
        copyWithAttributes(t) {
            return new this.constructor(this.getValue(), t);
        }
        copyWithAdditionalAttributes(t) {
            return this.copyWithAttributes(this.attributes.merge(t));
        }
        copyWithoutAttribute(t) {
            return this.copyWithAttributes(this.attributes.remove(t));
        }
        copy() {
            return this.copyWithAttributes(this.attributes);
        }
        getAttribute(t) {
            return this.attributes.get(t);
        }
        getAttributesHash() {
            return this.attributes;
        }
        getAttributes() {
            return this.attributes.toObject();
        }
        hasAttribute(t) {
            return this.attributes.has(t);
        }
        hasSameStringValueAsPiece(t) {
            return t && this.toString() === t.toString();
        }
        hasSameAttributesAsPiece(t) {
            return (
                t &&
                (this.attributes === t.attributes ||
                    this.attributes.isEqualTo(t.attributes))
            );
        }
        isBlockBreak() {
            return !1;
        }
        isEqualTo(t) {
            return (
                super.isEqualTo(...arguments) ||
                (this.hasSameConstructorAs(t) &&
                    this.hasSameStringValueAsPiece(t) &&
                    this.hasSameAttributesAsPiece(t))
            );
        }
        isEmpty() {
            return 0 === this.length;
        }
        isSerializable() {
            return !0;
        }
        toJSON() {
            return {
                type: this.constructor.type,
                attributes: this.getAttributes(),
            };
        }
        contentsForInspection() {
            return {
                type: this.constructor.type,
                attributes: this.attributes.inspect(),
            };
        }
        canBeGrouped() {
            return this.hasAttribute("href");
        }
        canBeGroupedWith(t) {
            return this.getAttribute("href") === t.getAttribute("href");
        }
        getLength() {
            return this.length;
        }
        canBeConsolidatedWith(t) {
            return !1;
        }
    }
    Ae(ye, "types", {});
    class Ce extends te {
        constructor(t) {
            super(...arguments), (this.url = t);
        }
        perform(t) {
            const e = new Image();
            (e.onload = () => (
                (e.width = this.width = e.naturalWidth),
                (e.height = this.height = e.naturalHeight),
                t(!0, e)
            )),
                (e.onerror = () => t(!1)),
                (e.src = this.url);
        }
    }
    class Re extends nt {
        static attachmentForFile(t) {
            const e = new this(this.attributesForFile(t));
            return e.setFile(t), e;
        }
        static attributesForFile(t) {
            return new _t({
                filename: t.name,
                filesize: t.size,
                contentType: t.type,
            });
        }
        static fromJSON(t) {
            return new this(t);
        }
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            super(t),
                (this.releaseFile = this.releaseFile.bind(this)),
                (this.attributes = _t.box(t)),
                this.didChangeAttributes();
        }
        getAttribute(t) {
            return this.attributes.get(t);
        }
        hasAttribute(t) {
            return this.attributes.has(t);
        }
        getAttributes() {
            return this.attributes.toObject();
        }
        setAttributes() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            const e = this.attributes.merge(t);
            var i, n, r, o;
            if (!this.attributes.isEqualTo(e))
                return (
                    (this.attributes = e),
                    this.didChangeAttributes(),
                    null === (i = this.previewDelegate) ||
                        void 0 === i ||
                        null === (n = i.attachmentDidChangeAttributes) ||
                        void 0 === n ||
                        n.call(i, this),
                    null === (r = this.delegate) ||
                    void 0 === r ||
                    null === (o = r.attachmentDidChangeAttributes) ||
                    void 0 === o
                        ? void 0
                        : o.call(r, this)
                );
        }
        didChangeAttributes() {
            if (this.isPreviewable()) return this.preloadURL();
        }
        isPending() {
            return null != this.file && !(this.getURL() || this.getHref());
        }
        isPreviewable() {
            return this.attributes.has("previewable")
                ? this.attributes.get("previewable")
                : Re.previewablePattern.test(this.getContentType());
        }
        getType() {
            return this.hasContent()
                ? "content"
                : this.isPreviewable()
                ? "preview"
                : "file";
        }
        getURL() {
            return this.attributes.get("url");
        }
        getHref() {
            return this.attributes.get("href");
        }
        getFilename() {
            return this.attributes.get("filename") || "";
        }
        getFilesize() {
            return this.attributes.get("filesize");
        }
        getFormattedFilesize() {
            const t = this.attributes.get("filesize");
            return "number" == typeof t ? u.formatter(t) : "";
        }
        getExtension() {
            var t;
            return null === (t = this.getFilename().match(/\.(\w+)$/)) ||
                void 0 === t
                ? void 0
                : t[1].toLowerCase();
        }
        getContentType() {
            return this.attributes.get("contentType");
        }
        hasContent() {
            return this.attributes.has("content");
        }
        getContent() {
            return this.attributes.get("content");
        }
        getWidth() {
            return this.attributes.get("width");
        }
        getHeight() {
            return this.attributes.get("height");
        }
        getFile() {
            return this.file;
        }
        setFile(t) {
            if (((this.file = t), this.isPreviewable()))
                return this.preloadFile();
        }
        releaseFile() {
            this.releasePreloadedFile(), (this.file = null);
        }
        getUploadProgress() {
            return null != this.uploadProgress ? this.uploadProgress : 0;
        }
        setUploadProgress(t) {
            var e, i;
            if (this.uploadProgress !== t)
                return (
                    (this.uploadProgress = t),
                    null === (e = this.uploadProgressDelegate) ||
                    void 0 === e ||
                    null === (i = e.attachmentDidChangeUploadProgress) ||
                    void 0 === i
                        ? void 0
                        : i.call(e, this)
                );
        }
        toJSON() {
            return this.getAttributes();
        }
        getCacheKey() {
            return [
                super.getCacheKey(...arguments),
                this.attributes.getCacheKey(),
                this.getPreviewURL(),
            ].join("/");
        }
        getPreviewURL() {
            return this.previewURL || this.preloadingURL;
        }
        setPreviewURL(t) {
            var e, i, n, r;
            if (t !== this.getPreviewURL())
                return (
                    (this.previewURL = t),
                    null === (e = this.previewDelegate) ||
                        void 0 === e ||
                        null === (i = e.attachmentDidChangeAttributes) ||
                        void 0 === i ||
                        i.call(e, this),
                    null === (n = this.delegate) ||
                    void 0 === n ||
                    null === (r = n.attachmentDidChangePreviewURL) ||
                    void 0 === r
                        ? void 0
                        : r.call(n, this)
                );
        }
        preloadURL() {
            return this.preload(this.getURL(), this.releaseFile);
        }
        preloadFile() {
            if (this.file)
                return (
                    (this.fileObjectURL = URL.createObjectURL(this.file)),
                    this.preload(this.fileObjectURL)
                );
        }
        releasePreloadedFile() {
            this.fileObjectURL &&
                (URL.revokeObjectURL(this.fileObjectURL),
                (this.fileObjectURL = null));
        }
        preload(t, e) {
            if (t && t !== this.getPreviewURL()) {
                this.preloadingURL = t;
                return new Ce(t)
                    .then((i) => {
                        let { width: n, height: r } = i;
                        return (
                            (this.getWidth() && this.getHeight()) ||
                                this.setAttributes({ width: n, height: r }),
                            (this.preloadingURL = null),
                            this.setPreviewURL(t),
                            null == e ? void 0 : e()
                        );
                    })
                    .catch(
                        () => (
                            (this.preloadingURL = null),
                            null == e ? void 0 : e()
                        )
                    );
            }
        }
    }
    Ae(Re, "previewablePattern", /^image(\/(gif|png|webp|jpe?g)|$)/);
    class Se extends ye {
        static fromJSON(t) {
            return new this(Re.fromJSON(t.attachment), t.attributes);
        }
        constructor(t) {
            super(...arguments),
                (this.attachment = t),
                (this.length = 1),
                this.ensureAttachmentExclusivelyHasAttribute("href"),
                this.attachment.hasContent() ||
                    this.removeProhibitedAttributes();
        }
        ensureAttachmentExclusivelyHasAttribute(t) {
            this.hasAttribute(t) &&
                (this.attachment.hasAttribute(t) ||
                    this.attachment.setAttributes(this.attributes.slice([t])),
                (this.attributes = this.attributes.remove(t)));
        }
        removeProhibitedAttributes() {
            const t = this.attributes.slice(Se.permittedAttributes);
            t.isEqualTo(this.attributes) || (this.attributes = t);
        }
        getValue() {
            return this.attachment;
        }
        isSerializable() {
            return !this.attachment.isPending();
        }
        getCaption() {
            return this.attributes.get("caption") || "";
        }
        isEqualTo(t) {
            var e;
            return (
                super.isEqualTo(t) &&
                this.attachment.id ===
                    (null == t || null === (e = t.attachment) || void 0 === e
                        ? void 0
                        : e.id)
            );
        }
        toString() {
            return "￼";
        }
        toJSON() {
            const t = super.toJSON(...arguments);
            return (t.attachment = this.attachment), t;
        }
        getCacheKey() {
            return [
                super.getCacheKey(...arguments),
                this.attachment.getCacheKey(),
            ].join("/");
        }
        toConsole() {
            return JSON.stringify(this.toString());
        }
    }
    Ae(Se, "permittedAttributes", ["caption", "presentation"]),
        ye.registerType("attachment", Se);
    class Ee extends ye {
        static fromJSON(t) {
            return new this(t.string, t.attributes);
        }
        constructor(t) {
            super(...arguments),
                (this.string = ((t) => t.replace(/\r\n?/g, "\n"))(t)),
                (this.length = this.string.length);
        }
        getValue() {
            return this.string;
        }
        toString() {
            return this.string.toString();
        }
        isBlockBreak() {
            return (
                "\n" === this.toString() &&
                !0 === this.getAttribute("blockBreak")
            );
        }
        toJSON() {
            const t = super.toJSON(...arguments);
            return (t.string = this.string), t;
        }
        canBeConsolidatedWith(t) {
            return (
                t &&
                this.hasSameConstructorAs(t) &&
                this.hasSameAttributesAsPiece(t)
            );
        }
        consolidateWith(t) {
            return new this.constructor(
                this.toString() + t.toString(),
                this.attributes
            );
        }
        splitAtOffset(t) {
            let e, i;
            return (
                0 === t
                    ? ((e = null), (i = this))
                    : t === this.length
                    ? ((e = this), (i = null))
                    : ((e = new this.constructor(
                          this.string.slice(0, t),
                          this.attributes
                      )),
                      (i = new this.constructor(
                          this.string.slice(t),
                          this.attributes
                      ))),
                [e, i]
            );
        }
        toConsole() {
            let { string: t } = this;
            return (
                t.length > 15 && (t = t.slice(0, 14) + "…"),
                JSON.stringify(t.toString())
            );
        }
    }
    ye.registerType("string", Ee);
    class ke extends nt {
        static box(t) {
            return t instanceof this ? t : new this(t);
        }
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            super(...arguments),
                (this.objects = t.slice(0)),
                (this.length = this.objects.length);
        }
        indexOf(t) {
            return this.objects.indexOf(t);
        }
        splice() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            return new this.constructor(ot(this.objects, ...e));
        }
        eachObject(t) {
            return this.objects.map((e, i) => t(e, i));
        }
        insertObjectAtIndex(t, e) {
            return this.splice(e, 0, t);
        }
        insertSplittableListAtIndex(t, e) {
            return this.splice(e, 0, ...t.objects);
        }
        insertSplittableListAtPosition(t, e) {
            const [i, n] = this.splitObjectAtPosition(e);
            return new this.constructor(i).insertSplittableListAtIndex(t, n);
        }
        editObjectAtIndex(t, e) {
            return this.replaceObjectAtIndex(e(this.objects[t]), t);
        }
        replaceObjectAtIndex(t, e) {
            return this.splice(e, 1, t);
        }
        removeObjectAtIndex(t) {
            return this.splice(t, 1);
        }
        getObjectAtIndex(t) {
            return this.objects[t];
        }
        getSplittableListInRange(t) {
            const [e, i, n] = this.splitObjectsAtRange(t);
            return new this.constructor(e.slice(i, n + 1));
        }
        selectSplittableList(t) {
            const e = this.objects.filter((e) => t(e));
            return new this.constructor(e);
        }
        removeObjectsInRange(t) {
            const [e, i, n] = this.splitObjectsAtRange(t);
            return new this.constructor(e).splice(i, n - i + 1);
        }
        transformObjectsInRange(t, e) {
            const [i, n, r] = this.splitObjectsAtRange(t),
                o = i.map((t, i) => (n <= i && i <= r ? e(t) : t));
            return new this.constructor(o);
        }
        splitObjectsAtRange(t) {
            let e,
                [i, n, r] = this.splitObjectAtPosition(De(t));
            return (
                ([i, e] = new this.constructor(i).splitObjectAtPosition(
                    we(t) + r
                )),
                [i, n, e - 1]
            );
        }
        getObjectAtPosition(t) {
            const { index: e } = this.findIndexAndOffsetAtPosition(t);
            return this.objects[e];
        }
        splitObjectAtPosition(t) {
            let e, i;
            const { index: n, offset: r } =
                    this.findIndexAndOffsetAtPosition(t),
                o = this.objects.slice(0);
            if (null != n)
                if (0 === r) (e = n), (i = 0);
                else {
                    const t = this.getObjectAtIndex(n),
                        [s, a] = t.splitAtOffset(r);
                    o.splice(n, 1, s, a), (e = n + 1), (i = s.getLength() - r);
                }
            else (e = o.length), (i = 0);
            return [o, e, i];
        }
        consolidate() {
            const t = [];
            let e = this.objects[0];
            return (
                this.objects.slice(1).forEach((i) => {
                    var n, r;
                    null !== (n = (r = e).canBeConsolidatedWith) &&
                    void 0 !== n &&
                    n.call(r, i)
                        ? (e = e.consolidateWith(i))
                        : (t.push(e), (e = i));
                }),
                e && t.push(e),
                new this.constructor(t)
            );
        }
        consolidateFromIndexToIndex(t, e) {
            const i = this.objects.slice(0).slice(t, e + 1),
                n = new this.constructor(i).consolidate().toArray();
            return this.splice(t, i.length, ...n);
        }
        findIndexAndOffsetAtPosition(t) {
            let e,
                i = 0;
            for (e = 0; e < this.objects.length; e++) {
                const n = i + this.objects[e].getLength();
                if (i <= t && t < n) return { index: e, offset: t - i };
                i = n;
            }
            return { index: null, offset: null };
        }
        findPositionAtIndexAndOffset(t, e) {
            let i = 0;
            for (let n = 0; n < this.objects.length; n++) {
                const r = this.objects[n];
                if (n < t) i += r.getLength();
                else if (n === t) {
                    i += e;
                    break;
                }
            }
            return i;
        }
        getEndPosition() {
            return (
                null == this.endPosition &&
                    ((this.endPosition = 0),
                    this.objects.forEach(
                        (t) => (this.endPosition += t.getLength())
                    )),
                this.endPosition
            );
        }
        toString() {
            return this.objects.join("");
        }
        toArray() {
            return this.objects.slice(0);
        }
        toJSON() {
            return this.toArray();
        }
        isEqualTo(t) {
            return (
                super.isEqualTo(...arguments) ||
                Le(this.objects, null == t ? void 0 : t.objects)
            );
        }
        contentsForInspection() {
            return {
                objects: "[".concat(
                    this.objects.map((t) => t.inspect()).join(", "),
                    "]"
                ),
            };
        }
    }
    const Le = function (t) {
            let e =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : [];
            if (t.length !== e.length) return !1;
            let i = !0;
            for (let n = 0; n < t.length; n++) {
                const r = t[n];
                i && !r.isEqualTo(e[n]) && (i = !1);
            }
            return i;
        },
        De = (t) => t[0],
        we = (t) => t[1];
    class Te extends nt {
        static textForAttachmentWithAttributes(t, e) {
            return new this([new Se(t, e)]);
        }
        static textForStringWithAttributes(t, e) {
            return new this([new Ee(t, e)]);
        }
        static fromJSON(t) {
            return new this(Array.from(t).map((t) => ye.fromJSON(t)));
        }
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            super(...arguments);
            const e = t.filter((t) => !t.isEmpty());
            this.pieceList = new ke(e);
        }
        copy() {
            return this.copyWithPieceList(this.pieceList);
        }
        copyWithPieceList(t) {
            return new this.constructor(t.consolidate().toArray());
        }
        copyUsingObjectMap(t) {
            const e = this.getPieces().map((e) => t.find(e) || e);
            return new this.constructor(e);
        }
        appendText(t) {
            return this.insertTextAtPosition(t, this.getLength());
        }
        insertTextAtPosition(t, e) {
            return this.copyWithPieceList(
                this.pieceList.insertSplittableListAtPosition(t.pieceList, e)
            );
        }
        removeTextAtRange(t) {
            return this.copyWithPieceList(
                this.pieceList.removeObjectsInRange(t)
            );
        }
        replaceTextAtRange(t, e) {
            return this.removeTextAtRange(e).insertTextAtPosition(t, e[0]);
        }
        moveTextFromRangeToPosition(t, e) {
            if (t[0] <= e && e <= t[1]) return;
            const i = this.getTextAtRange(t),
                n = i.getLength();
            return (
                t[0] < e && (e -= n),
                this.removeTextAtRange(t).insertTextAtPosition(i, e)
            );
        }
        addAttributeAtRange(t, e, i) {
            const n = {};
            return (n[t] = e), this.addAttributesAtRange(n, i);
        }
        addAttributesAtRange(t, e) {
            return this.copyWithPieceList(
                this.pieceList.transformObjectsInRange(e, (e) =>
                    e.copyWithAdditionalAttributes(t)
                )
            );
        }
        removeAttributeAtRange(t, e) {
            return this.copyWithPieceList(
                this.pieceList.transformObjectsInRange(e, (e) =>
                    e.copyWithoutAttribute(t)
                )
            );
        }
        setAttributesAtRange(t, e) {
            return this.copyWithPieceList(
                this.pieceList.transformObjectsInRange(e, (e) =>
                    e.copyWithAttributes(t)
                )
            );
        }
        getAttributesAtPosition(t) {
            var e;
            return (
                (null === (e = this.pieceList.getObjectAtPosition(t)) ||
                void 0 === e
                    ? void 0
                    : e.getAttributes()) || {}
            );
        }
        getCommonAttributes() {
            const t = Array.from(this.pieceList.toArray()).map((t) =>
                t.getAttributes()
            );
            return _t.fromCommonAttributesOfObjects(t).toObject();
        }
        getCommonAttributesAtRange(t) {
            return this.getTextAtRange(t).getCommonAttributes() || {};
        }
        getExpandedRangeForAttributeAtOffset(t, e) {
            let i,
                n = (i = e);
            const r = this.getLength();
            for (; n > 0 && this.getCommonAttributesAtRange([n - 1, i])[t]; )
                n--;
            for (; i < r && this.getCommonAttributesAtRange([e, i + 1])[t]; )
                i++;
            return [n, i];
        }
        getTextAtRange(t) {
            return this.copyWithPieceList(
                this.pieceList.getSplittableListInRange(t)
            );
        }
        getStringAtRange(t) {
            return this.pieceList.getSplittableListInRange(t).toString();
        }
        getStringAtPosition(t) {
            return this.getStringAtRange([t, t + 1]);
        }
        startsWithString(t) {
            return this.getStringAtRange([0, t.length]) === t;
        }
        endsWithString(t) {
            const e = this.getLength();
            return this.getStringAtRange([e - t.length, e]) === t;
        }
        getAttachmentPieces() {
            return this.pieceList.toArray().filter((t) => !!t.attachment);
        }
        getAttachments() {
            return this.getAttachmentPieces().map((t) => t.attachment);
        }
        getAttachmentAndPositionById(t) {
            let e = 0;
            for (const n of this.pieceList.toArray()) {
                var i;
                if (
                    (null === (i = n.attachment) || void 0 === i
                        ? void 0
                        : i.id) === t
                )
                    return { attachment: n.attachment, position: e };
                e += n.length;
            }
            return { attachment: null, position: null };
        }
        getAttachmentById(t) {
            const { attachment: e } = this.getAttachmentAndPositionById(t);
            return e;
        }
        getRangeOfAttachment(t) {
            const e = this.getAttachmentAndPositionById(t.id),
                i = e.position;
            if ((t = e.attachment)) return [i, i + 1];
        }
        updateAttributesForAttachment(t, e) {
            const i = this.getRangeOfAttachment(e);
            return i ? this.addAttributesAtRange(t, i) : this;
        }
        getLength() {
            return this.pieceList.getEndPosition();
        }
        isEmpty() {
            return 0 === this.getLength();
        }
        isEqualTo(t) {
            var e;
            return (
                super.isEqualTo(t) ||
                (null == t || null === (e = t.pieceList) || void 0 === e
                    ? void 0
                    : e.isEqualTo(this.pieceList))
            );
        }
        isBlockBreak() {
            return (
                1 === this.getLength() &&
                this.pieceList.getObjectAtIndex(0).isBlockBreak()
            );
        }
        eachPiece(t) {
            return this.pieceList.eachObject(t);
        }
        getPieces() {
            return this.pieceList.toArray();
        }
        getPieceAtPosition(t) {
            return this.pieceList.getObjectAtPosition(t);
        }
        contentsForInspection() {
            return { pieceList: this.pieceList.inspect() };
        }
        toSerializableText() {
            const t = this.pieceList.selectSplittableList((t) =>
                t.isSerializable()
            );
            return this.copyWithPieceList(t);
        }
        toString() {
            return this.pieceList.toString();
        }
        toJSON() {
            return this.pieceList.toJSON();
        }
        toConsole() {
            return JSON.stringify(
                this.pieceList.toArray().map((t) => JSON.parse(t.toConsole()))
            );
        }
        getDirection() {
            return at(this.toString());
        }
        isRTL() {
            return "rtl" === this.getDirection();
        }
    }
    class Be extends nt {
        static fromJSON(t) {
            return new this(Te.fromJSON(t.text), t.attributes);
        }
        constructor(t, e) {
            super(...arguments),
                (this.text = Fe(t || new Te())),
                (this.attributes = e || []);
        }
        isEmpty() {
            return this.text.isBlockBreak();
        }
        isEqualTo(t) {
            return (
                !!super.isEqualTo(t) ||
                (this.text.isEqualTo(null == t ? void 0 : t.text) &&
                    rt(this.attributes, null == t ? void 0 : t.attributes))
            );
        }
        copyWithText(t) {
            return new Be(t, this.attributes);
        }
        copyWithoutText() {
            return this.copyWithText(null);
        }
        copyWithAttributes(t) {
            return new Be(this.text, t);
        }
        copyWithoutAttributes() {
            return this.copyWithAttributes(null);
        }
        copyUsingObjectMap(t) {
            const e = t.find(this.text);
            return e
                ? this.copyWithText(e)
                : this.copyWithText(this.text.copyUsingObjectMap(t));
        }
        addAttribute(t) {
            const e = this.attributes.concat(je(t));
            return this.copyWithAttributes(e);
        }
        removeAttribute(t) {
            const { listAttribute: e } = gt(t),
                i = Ue(Ue(this.attributes, t), e);
            return this.copyWithAttributes(i);
        }
        removeLastAttribute() {
            return this.removeAttribute(this.getLastAttribute());
        }
        getLastAttribute() {
            return We(this.attributes);
        }
        getAttributes() {
            return this.attributes.slice(0);
        }
        getAttributeLevel() {
            return this.attributes.length;
        }
        getAttributeAtLevel(t) {
            return this.attributes[t - 1];
        }
        hasAttribute(t) {
            return this.attributes.includes(t);
        }
        hasAttributes() {
            return this.getAttributeLevel() > 0;
        }
        getLastNestableAttribute() {
            return We(this.getNestableAttributes());
        }
        getNestableAttributes() {
            return this.attributes.filter((t) => gt(t).nestable);
        }
        getNestingLevel() {
            return this.getNestableAttributes().length;
        }
        decreaseNestingLevel() {
            const t = this.getLastNestableAttribute();
            return t ? this.removeAttribute(t) : this;
        }
        increaseNestingLevel() {
            const t = this.getLastNestableAttribute();
            if (t) {
                const e = this.attributes.lastIndexOf(t),
                    i = ot(this.attributes, e + 1, 0, ...je(t));
                return this.copyWithAttributes(i);
            }
            return this;
        }
        getListItemAttributes() {
            return this.attributes.filter((t) => gt(t).listAttribute);
        }
        isListItem() {
            var t;
            return null === (t = gt(this.getLastAttribute())) || void 0 === t
                ? void 0
                : t.listAttribute;
        }
        isTerminalBlock() {
            var t;
            return null === (t = gt(this.getLastAttribute())) || void 0 === t
                ? void 0
                : t.terminal;
        }
        breaksOnReturn() {
            var t;
            return null === (t = gt(this.getLastAttribute())) || void 0 === t
                ? void 0
                : t.breakOnReturn;
        }
        findLineBreakInDirectionFromPosition(t, e) {
            const i = this.toString();
            let n;
            switch (t) {
                case "forward":
                    n = i.indexOf("\n", e);
                    break;
                case "backward":
                    n = i.slice(0, e).lastIndexOf("\n");
            }
            if (-1 !== n) return n;
        }
        contentsForInspection() {
            return { text: this.text.inspect(), attributes: this.attributes };
        }
        toString() {
            return this.text.toString();
        }
        toJSON() {
            return { text: this.text, attributes: this.attributes };
        }
        getDirection() {
            return this.text.getDirection();
        }
        isRTL() {
            return this.text.isRTL();
        }
        getLength() {
            return this.text.getLength();
        }
        canBeConsolidatedWith(t) {
            return (
                !this.hasAttributes() &&
                !t.hasAttributes() &&
                this.getDirection() === t.getDirection()
            );
        }
        consolidateWith(t) {
            const e = Te.textForStringWithAttributes("\n"),
                i = this.getTextWithoutBlockBreak().appendText(e);
            return this.copyWithText(i.appendText(t.text));
        }
        splitAtOffset(t) {
            let e, i;
            return (
                0 === t
                    ? ((e = null), (i = this))
                    : t === this.getLength()
                    ? ((e = this), (i = null))
                    : ((e = this.copyWithText(
                          this.text.getTextAtRange([0, t])
                      )),
                      (i = this.copyWithText(
                          this.text.getTextAtRange([t, this.getLength()])
                      ))),
                [e, i]
            );
        }
        getBlockBreakPosition() {
            return this.text.getLength() - 1;
        }
        getTextWithoutBlockBreak() {
            return Oe(this.text)
                ? this.text.getTextAtRange([0, this.getBlockBreakPosition()])
                : this.text.copy();
        }
        canBeGrouped(t) {
            return this.attributes[t];
        }
        canBeGroupedWith(t, e) {
            const i = t.getAttributes(),
                r = i[e],
                o = this.attributes[e];
            return (
                o === r &&
                !(
                    !1 === gt(o).group &&
                    !(() => {
                        if (!ht) {
                            ht = [];
                            for (const t in n) {
                                const { listAttribute: e } = n[t];
                                null != e && ht.push(e);
                            }
                        }
                        return ht;
                    })().includes(i[e + 1])
                ) &&
                (this.getDirection() === t.getDirection() || t.isEmpty())
            );
        }
    }
    const Fe = function (t) {
            return (t = Ie(t)), (t = Ne(t));
        },
        Ie = function (t) {
            let e = !1;
            const i = t.getPieces();
            let n = i.slice(0, i.length - 1);
            const r = i[i.length - 1];
            return r
                ? ((n = n.map((t) =>
                      t.isBlockBreak() ? ((e = !0), Me(t)) : t
                  )),
                  e ? new Te([...n, r]) : t)
                : t;
        },
        Pe = Te.textForStringWithAttributes("\n", { blockBreak: !0 }),
        Ne = function (t) {
            return Oe(t) ? t : t.appendText(Pe);
        },
        Oe = function (t) {
            const e = t.getLength();
            if (0 === e) return !1;
            return t.getTextAtRange([e - 1, e]).isBlockBreak();
        },
        Me = (t) => t.copyWithoutAttribute("blockBreak"),
        je = function (t) {
            const { listAttribute: e } = gt(t);
            return e ? [e, t] : [t];
        },
        We = (t) => t.slice(-1)[0],
        Ue = function (t, e) {
            const i = t.lastIndexOf(e);
            return -1 === i ? t : ot(t, i, 1);
        };
    class qe extends nt {
        static fromJSON(t) {
            return new this(Array.from(t).map((t) => Be.fromJSON(t)));
        }
        static fromString(t, e) {
            const i = Te.textForStringWithAttributes(t, e);
            return new this([new Be(i)]);
        }
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            super(...arguments),
                0 === t.length && (t = [new Be()]),
                (this.blockList = ke.box(t));
        }
        isEmpty() {
            const t = this.getBlockAtIndex(0);
            return (
                1 === this.blockList.length && t.isEmpty() && !t.hasAttributes()
            );
        }
        copy() {
            const t = (arguments.length > 0 && void 0 !== arguments[0]
                ? arguments[0]
                : {}
            ).consolidateBlocks
                ? this.blockList.consolidate().toArray()
                : this.blockList.toArray();
            return new this.constructor(t);
        }
        copyUsingObjectsFromDocument(t) {
            const e = new Yt(t.getObjects());
            return this.copyUsingObjectMap(e);
        }
        copyUsingObjectMap(t) {
            const e = this.getBlocks().map(
                (e) => t.find(e) || e.copyUsingObjectMap(t)
            );
            return new this.constructor(e);
        }
        copyWithBaseBlockAttributes() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            const e = this.getBlocks().map((e) => {
                const i = t.concat(e.getAttributes());
                return e.copyWithAttributes(i);
            });
            return new this.constructor(e);
        }
        replaceBlock(t, e) {
            const i = this.blockList.indexOf(t);
            return -1 === i
                ? this
                : new this.constructor(
                      this.blockList.replaceObjectAtIndex(e, i)
                  );
        }
        insertDocumentAtRange(t, e) {
            const { blockList: i } = t;
            e = Lt(e);
            let [n] = e;
            const { index: r, offset: o } = this.locationFromPosition(n);
            let s = this;
            const a = this.getBlockAtPosition(n);
            return (
                Dt(e) && a.isEmpty() && !a.hasAttributes()
                    ? (s = new this.constructor(
                          s.blockList.removeObjectAtIndex(r)
                      ))
                    : a.getBlockBreakPosition() === o && n++,
                (s = s.removeTextAtRange(e)),
                new this.constructor(
                    s.blockList.insertSplittableListAtPosition(i, n)
                )
            );
        }
        mergeDocumentAtRange(t, e) {
            let i, n;
            e = Lt(e);
            const [r] = e,
                o = this.locationFromPosition(r),
                s = this.getBlockAtIndex(o.index).getAttributes(),
                a = t.getBaseBlockAttributes(),
                l = s.slice(-a.length);
            if (rt(a, l)) {
                const e = s.slice(0, -a.length);
                i = t.copyWithBaseBlockAttributes(e);
            } else i = t.copy({ consolidateBlocks: !0 }).copyWithBaseBlockAttributes(s);
            const c = i.getBlockCount(),
                u = i.getBlockAtIndex(0);
            if (rt(s, u.getAttributes())) {
                const t = u.getTextWithoutBlockBreak();
                if (((n = this.insertTextAtRange(t, e)), c > 1)) {
                    i = new this.constructor(i.getBlocks().slice(1));
                    const e = r + t.getLength();
                    n = n.insertDocumentAtRange(i, e);
                }
            } else n = this.insertDocumentAtRange(i, e);
            return n;
        }
        insertTextAtRange(t, e) {
            e = Lt(e);
            const [i] = e,
                { index: n, offset: r } = this.locationFromPosition(i),
                o = this.removeTextAtRange(e);
            return new this.constructor(
                o.blockList.editObjectAtIndex(n, (e) =>
                    e.copyWithText(e.text.insertTextAtPosition(t, r))
                )
            );
        }
        removeTextAtRange(t) {
            let e;
            t = Lt(t);
            const [i, n] = t;
            if (Dt(t)) return this;
            const [r, o] = Array.from(this.locationRangeFromRange(t)),
                s = r.index,
                a = r.offset,
                l = this.getBlockAtIndex(s),
                c = o.index,
                u = o.offset,
                h = this.getBlockAtIndex(c);
            if (
                n - i == 1 &&
                l.getBlockBreakPosition() === a &&
                h.getBlockBreakPosition() !== u &&
                "\n" === h.text.getStringAtPosition(u)
            )
                e = this.blockList.editObjectAtIndex(c, (t) =>
                    t.copyWithText(t.text.removeTextAtRange([u, u + 1]))
                );
            else {
                let t;
                const i = l.text.getTextAtRange([0, a]),
                    n = h.text.getTextAtRange([u, h.getLength()]),
                    r = i.appendText(n);
                t =
                    s !== c &&
                    0 === a &&
                    l.getAttributeLevel() >= h.getAttributeLevel()
                        ? h.copyWithText(r)
                        : l.copyWithText(r);
                const o = c + 1 - s;
                e = this.blockList.splice(s, o, t);
            }
            return new this.constructor(e);
        }
        moveTextFromRangeToPosition(t, e) {
            let i;
            t = Lt(t);
            const [n, r] = t;
            if (n <= e && e <= r) return this;
            let o = this.getDocumentAtRange(t),
                s = this.removeTextAtRange(t);
            const a = n < e;
            a && (e -= o.getLength());
            const [l, ...c] = o.getBlocks();
            return (
                0 === c.length
                    ? ((i = l.getTextWithoutBlockBreak()), a && (e += 1))
                    : (i = l.text),
                (s = s.insertTextAtRange(i, e)),
                0 === c.length
                    ? s
                    : ((o = new this.constructor(c)),
                      (e += i.getLength()),
                      s.insertDocumentAtRange(o, e))
            );
        }
        addAttributeAtRange(t, e, i) {
            let { blockList: n } = this;
            return (
                this.eachBlockAtRange(
                    i,
                    (i, r, o) =>
                        (n = n.editObjectAtIndex(o, function () {
                            return gt(t)
                                ? i.addAttribute(t, e)
                                : r[0] === r[1]
                                ? i
                                : i.copyWithText(
                                      i.text.addAttributeAtRange(t, e, r)
                                  );
                        }))
                ),
                new this.constructor(n)
            );
        }
        addAttribute(t, e) {
            let { blockList: i } = this;
            return (
                this.eachBlock(
                    (n, r) =>
                        (i = i.editObjectAtIndex(r, () => n.addAttribute(t, e)))
                ),
                new this.constructor(i)
            );
        }
        removeAttributeAtRange(t, e) {
            let { blockList: i } = this;
            return (
                this.eachBlockAtRange(e, function (e, n, r) {
                    gt(t)
                        ? (i = i.editObjectAtIndex(r, () =>
                              e.removeAttribute(t)
                          ))
                        : n[0] !== n[1] &&
                          (i = i.editObjectAtIndex(r, () =>
                              e.copyWithText(
                                  e.text.removeAttributeAtRange(t, n)
                              )
                          ));
                }),
                new this.constructor(i)
            );
        }
        updateAttributesForAttachment(t, e) {
            const i = this.getRangeOfAttachment(e),
                [n] = Array.from(i),
                { index: r } = this.locationFromPosition(n),
                o = this.getTextAtIndex(r);
            return new this.constructor(
                this.blockList.editObjectAtIndex(r, (i) =>
                    i.copyWithText(o.updateAttributesForAttachment(t, e))
                )
            );
        }
        removeAttributeForAttachment(t, e) {
            const i = this.getRangeOfAttachment(e);
            return this.removeAttributeAtRange(t, i);
        }
        insertBlockBreakAtRange(t) {
            let e;
            t = Lt(t);
            const [i] = t,
                { offset: n } = this.locationFromPosition(i),
                r = this.removeTextAtRange(t);
            return (
                0 === n && (e = [new Be()]),
                new this.constructor(
                    r.blockList.insertSplittableListAtPosition(new ke(e), i)
                )
            );
        }
        applyBlockAttributeAtRange(t, e, i) {
            const n = this.expandRangeToLineBreaksAndSplitBlocks(i);
            let r = n.document;
            i = n.range;
            const o = gt(t);
            if (o.listAttribute) {
                r = r.removeLastListAttributeAtRange(i, {
                    exceptAttributeName: t,
                });
                const e = r.convertLineBreaksToBlockBreaksInRange(i);
                (r = e.document), (i = e.range);
            } else r = o.exclusive ? r.removeBlockAttributesAtRange(i) : o.terminal ? r.removeLastTerminalAttributeAtRange(i) : r.consolidateBlocksAtRange(i);
            return r.addAttributeAtRange(t, e, i);
        }
        removeLastListAttributeAtRange(t) {
            let e =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {},
                { blockList: i } = this;
            return (
                this.eachBlockAtRange(t, function (t, n, r) {
                    const o = t.getLastAttribute();
                    o &&
                        gt(o).listAttribute &&
                        o !== e.exceptAttributeName &&
                        (i = i.editObjectAtIndex(r, () =>
                            t.removeAttribute(o)
                        ));
                }),
                new this.constructor(i)
            );
        }
        removeLastTerminalAttributeAtRange(t) {
            let { blockList: e } = this;
            return (
                this.eachBlockAtRange(t, function (t, i, n) {
                    const r = t.getLastAttribute();
                    r &&
                        gt(r).terminal &&
                        (e = e.editObjectAtIndex(n, () =>
                            t.removeAttribute(r)
                        ));
                }),
                new this.constructor(e)
            );
        }
        removeBlockAttributesAtRange(t) {
            let { blockList: e } = this;
            return (
                this.eachBlockAtRange(t, function (t, i, n) {
                    t.hasAttributes() &&
                        (e = e.editObjectAtIndex(n, () =>
                            t.copyWithoutAttributes()
                        ));
                }),
                new this.constructor(e)
            );
        }
        expandRangeToLineBreaksAndSplitBlocks(t) {
            let e;
            t = Lt(t);
            let [i, n] = t;
            const r = this.locationFromPosition(i),
                o = this.locationFromPosition(n);
            let s = this;
            const a = s.getBlockAtIndex(r.index);
            if (
                ((r.offset = a.findLineBreakInDirectionFromPosition(
                    "backward",
                    r.offset
                )),
                null != r.offset &&
                    ((e = s.positionFromLocation(r)),
                    (s = s.insertBlockBreakAtRange([e, e + 1])),
                    (o.index += 1),
                    (o.offset -= s.getBlockAtIndex(r.index).getLength()),
                    (r.index += 1)),
                (r.offset = 0),
                0 === o.offset && o.index > r.index)
            )
                (o.index -= 1),
                    (o.offset = s
                        .getBlockAtIndex(o.index)
                        .getBlockBreakPosition());
            else {
                const t = s.getBlockAtIndex(o.index);
                "\n" === t.text.getStringAtRange([o.offset - 1, o.offset])
                    ? (o.offset -= 1)
                    : (o.offset = t.findLineBreakInDirectionFromPosition(
                          "forward",
                          o.offset
                      )),
                    o.offset !== t.getBlockBreakPosition() &&
                        ((e = s.positionFromLocation(o)),
                        (s = s.insertBlockBreakAtRange([e, e + 1])));
            }
            return (
                (i = s.positionFromLocation(r)),
                (n = s.positionFromLocation(o)),
                { document: s, range: (t = Lt([i, n])) }
            );
        }
        convertLineBreaksToBlockBreaksInRange(t) {
            t = Lt(t);
            let [e] = t;
            const i = this.getStringAtRange(t).slice(0, -1);
            let n = this;
            return (
                i.replace(/.*?\n/g, function (t) {
                    (e += t.length),
                        (n = n.insertBlockBreakAtRange([e - 1, e]));
                }),
                { document: n, range: t }
            );
        }
        consolidateBlocksAtRange(t) {
            t = Lt(t);
            const [e, i] = t,
                n = this.locationFromPosition(e).index,
                r = this.locationFromPosition(i).index;
            return new this.constructor(
                this.blockList.consolidateFromIndexToIndex(n, r)
            );
        }
        getDocumentAtRange(t) {
            t = Lt(t);
            const e = this.blockList.getSplittableListInRange(t).toArray();
            return new this.constructor(e);
        }
        getStringAtRange(t) {
            let e;
            const i = (t = Lt(t));
            return (
                i[i.length - 1] !== this.getLength() && (e = -1),
                this.getDocumentAtRange(t).toString().slice(0, e)
            );
        }
        getBlockAtIndex(t) {
            return this.blockList.getObjectAtIndex(t);
        }
        getBlockAtPosition(t) {
            const { index: e } = this.locationFromPosition(t);
            return this.getBlockAtIndex(e);
        }
        getTextAtIndex(t) {
            var e;
            return null === (e = this.getBlockAtIndex(t)) || void 0 === e
                ? void 0
                : e.text;
        }
        getTextAtPosition(t) {
            const { index: e } = this.locationFromPosition(t);
            return this.getTextAtIndex(e);
        }
        getPieceAtPosition(t) {
            const { index: e, offset: i } = this.locationFromPosition(t);
            return this.getTextAtIndex(e).getPieceAtPosition(i);
        }
        getCharacterAtPosition(t) {
            const { index: e, offset: i } = this.locationFromPosition(t);
            return this.getTextAtIndex(e).getStringAtRange([i, i + 1]);
        }
        getLength() {
            return this.blockList.getEndPosition();
        }
        getBlocks() {
            return this.blockList.toArray();
        }
        getBlockCount() {
            return this.blockList.length;
        }
        getEditCount() {
            return this.editCount;
        }
        eachBlock(t) {
            return this.blockList.eachObject(t);
        }
        eachBlockAtRange(t, e) {
            let i, n;
            t = Lt(t);
            const [r, o] = t,
                s = this.locationFromPosition(r),
                a = this.locationFromPosition(o);
            if (s.index === a.index)
                return (
                    (i = this.getBlockAtIndex(s.index)),
                    (n = [s.offset, a.offset]),
                    e(i, n, s.index)
                );
            for (let t = s.index; t <= a.index; t++)
                if (((i = this.getBlockAtIndex(t)), i)) {
                    switch (t) {
                        case s.index:
                            n = [s.offset, i.text.getLength()];
                            break;
                        case a.index:
                            n = [0, a.offset];
                            break;
                        default:
                            n = [0, i.text.getLength()];
                    }
                    e(i, n, t);
                }
        }
        getCommonAttributesAtRange(t) {
            t = Lt(t);
            const [e] = t;
            if (Dt(t)) return this.getCommonAttributesAtPosition(e);
            {
                const e = [],
                    i = [];
                return (
                    this.eachBlockAtRange(t, function (t, n) {
                        if (n[0] !== n[1])
                            return (
                                e.push(t.text.getCommonAttributesAtRange(n)),
                                i.push(Ve(t))
                            );
                    }),
                    _t
                        .fromCommonAttributesOfObjects(e)
                        .merge(_t.fromCommonAttributesOfObjects(i))
                        .toObject()
                );
            }
        }
        getCommonAttributesAtPosition(t) {
            let e, i;
            const { index: n, offset: r } = this.locationFromPosition(t),
                o = this.getBlockAtIndex(n);
            if (!o) return {};
            const s = Ve(o),
                a = o.text.getAttributesAtPosition(r),
                l = o.text.getAttributesAtPosition(r - 1),
                c = Object.keys(W).filter((t) => W[t].inheritable);
            for (e in l)
                (i = l[e]), (i === a[e] || c.includes(e)) && (s[e] = i);
            return s;
        }
        getRangeOfCommonAttributeAtPosition(t, e) {
            const { index: i, offset: n } = this.locationFromPosition(e),
                r = this.getTextAtIndex(i),
                [o, s] = Array.from(
                    r.getExpandedRangeForAttributeAtOffset(t, n)
                ),
                a = this.positionFromLocation({ index: i, offset: o }),
                l = this.positionFromLocation({ index: i, offset: s });
            return Lt([a, l]);
        }
        getBaseBlockAttributes() {
            let t = this.getBlockAtIndex(0).getAttributes();
            for (let e = 1; e < this.getBlockCount(); e++) {
                const i = this.getBlockAtIndex(e).getAttributes(),
                    n = Math.min(t.length, i.length);
                t = (() => {
                    const e = [];
                    for (let r = 0; r < n && i[r] === t[r]; r++) e.push(i[r]);
                    return e;
                })();
            }
            return t;
        }
        getAttachmentById(t) {
            for (const e of this.getAttachments()) if (e.id === t) return e;
        }
        getAttachmentPieces() {
            let t = [];
            return (
                this.blockList.eachObject((e) => {
                    let { text: i } = e;
                    return (t = t.concat(i.getAttachmentPieces()));
                }),
                t
            );
        }
        getAttachments() {
            return this.getAttachmentPieces().map((t) => t.attachment);
        }
        getRangeOfAttachment(t) {
            let e = 0;
            const i = this.blockList.toArray();
            for (let n = 0; n < i.length; n++) {
                const { text: r } = i[n],
                    o = r.getRangeOfAttachment(t);
                if (o) return Lt([e + o[0], e + o[1]]);
                e += r.getLength();
            }
        }
        getLocationRangeOfAttachment(t) {
            const e = this.getRangeOfAttachment(t);
            return this.locationRangeFromRange(e);
        }
        getAttachmentPieceForAttachment(t) {
            for (const e of this.getAttachmentPieces())
                if (e.attachment === t) return e;
        }
        findRangesForBlockAttribute(t) {
            let e = 0;
            const i = [];
            return (
                this.getBlocks().forEach((n) => {
                    const r = n.getLength();
                    n.hasAttribute(t) && i.push([e, e + r]), (e += r);
                }),
                i
            );
        }
        findRangesForTextAttribute(t) {
            let { withValue: e } =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {},
                i = 0,
                n = [];
            const r = [];
            return (
                this.getPieces().forEach((o) => {
                    const s = o.getLength();
                    (function (i) {
                        return e ? i.getAttribute(t) === e : i.hasAttribute(t);
                    })(o) &&
                        (n[1] === i
                            ? (n[1] = i + s)
                            : r.push((n = [i, i + s]))),
                        (i += s);
                }),
                r
            );
        }
        locationFromPosition(t) {
            const e = this.blockList.findIndexAndOffsetAtPosition(
                Math.max(0, t)
            );
            if (null != e.index) return e;
            {
                const t = this.getBlocks();
                return {
                    index: t.length - 1,
                    offset: t[t.length - 1].getLength(),
                };
            }
        }
        positionFromLocation(t) {
            return this.blockList.findPositionAtIndexAndOffset(
                t.index,
                t.offset
            );
        }
        locationRangeFromPosition(t) {
            return Lt(this.locationFromPosition(t));
        }
        locationRangeFromRange(t) {
            if (!(t = Lt(t))) return;
            const [e, i] = Array.from(t),
                n = this.locationFromPosition(e),
                r = this.locationFromPosition(i);
            return Lt([n, r]);
        }
        rangeFromLocationRange(t) {
            let e;
            t = Lt(t);
            const i = this.positionFromLocation(t[0]);
            return Dt(t) || (e = this.positionFromLocation(t[1])), Lt([i, e]);
        }
        isEqualTo(t) {
            return this.blockList.isEqualTo(null == t ? void 0 : t.blockList);
        }
        getTexts() {
            return this.getBlocks().map((t) => t.text);
        }
        getPieces() {
            const t = [];
            return (
                Array.from(this.getTexts()).forEach((e) => {
                    t.push(...Array.from(e.getPieces() || []));
                }),
                t
            );
        }
        getObjects() {
            return this.getBlocks()
                .concat(this.getTexts())
                .concat(this.getPieces());
        }
        toSerializableDocument() {
            const t = [];
            return (
                this.blockList.eachObject((e) =>
                    t.push(e.copyWithText(e.text.toSerializableText()))
                ),
                new this.constructor(t)
            );
        }
        toString() {
            return this.blockList.toString();
        }
        toJSON() {
            return this.blockList.toJSON();
        }
        toConsole() {
            return JSON.stringify(
                this.blockList
                    .toArray()
                    .map((t) => JSON.parse(t.text.toConsole()))
            );
        }
    }
    const Ve = function (t) {
            const e = {},
                i = t.getLastAttribute();
            return i && (e[i] = !0), e;
        },
        ze = "style href src width height class".split(" "),
        _e = "javascript:".split(" "),
        He = "script iframe form".split(" ");
    class Je extends z {
        static sanitize(t, e) {
            const i = new this(t, e);
            return i.sanitize(), i;
        }
        constructor(t) {
            let {
                allowedAttributes: e,
                forbiddenProtocols: i,
                forbiddenElements: n,
            } = arguments.length > 1 && void 0 !== arguments[1]
                ? arguments[1]
                : {};
            super(...arguments),
                (this.allowedAttributes = e || ze),
                (this.forbiddenProtocols = i || _e),
                (this.forbiddenElements = n || He),
                (this.body = Ke(t));
        }
        sanitize() {
            return this.sanitizeElements(), this.normalizeListElementNesting();
        }
        getHTML() {
            return this.body.innerHTML;
        }
        getBody() {
            return this.body;
        }
        sanitizeElements() {
            const t = S(this.body),
                e = [];
            for (; t.nextNode(); ) {
                const i = t.currentNode;
                switch (i.nodeType) {
                    case Node.ELEMENT_NODE:
                        this.elementIsRemovable(i)
                            ? e.push(i)
                            : this.sanitizeElement(i);
                        break;
                    case Node.COMMENT_NODE:
                        e.push(i);
                }
            }
            return e.forEach((t) => R(t)), this.body;
        }
        sanitizeElement(t) {
            return (
                t.hasAttribute("href") &&
                    this.forbiddenProtocols.includes(t.protocol) &&
                    t.removeAttribute("href"),
                Array.from(t.attributes).forEach((e) => {
                    let { name: i } = e;
                    this.allowedAttributes.includes(i) ||
                        0 === i.indexOf("data-trix") ||
                        t.removeAttribute(i);
                }),
                t
            );
        }
        normalizeListElementNesting() {
            return (
                Array.from(this.body.querySelectorAll("ul,ol")).forEach((t) => {
                    const e = t.previousElementSibling;
                    e && "li" === E(e) && e.appendChild(t);
                }),
                this.body
            );
        }
        elementIsRemovable(t) {
            if ((null == t ? void 0 : t.nodeType) === Node.ELEMENT_NODE)
                return (
                    this.elementIsForbidden(t) ||
                    this.elementIsntSerializable(t)
                );
        }
        elementIsForbidden(t) {
            return this.forbiddenElements.includes(E(t));
        }
        elementIsntSerializable(t) {
            return "false" === t.getAttribute("data-trix-serialize") && !P(t);
        }
    }
    const Ke = function () {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : "";
            t = t.replace(/<\/html[^>]*>[^]*$/i, "</html>");
            const e = document.implementation.createHTMLDocument("");
            return (
                (e.documentElement.innerHTML = t),
                Array.from(e.head.querySelectorAll("style")).forEach((t) => {
                    e.body.appendChild(t);
                }),
                e.body
            );
        },
        Ge = function (t) {
            let e =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            return { string: (t = Wt(t)), attributes: e, type: "string" };
        },
        $e = (t, e) => {
            try {
                return JSON.parse(t.getAttribute("data-trix-".concat(e)));
            } catch (t) {
                return {};
            }
        };
    class Xe extends z {
        static parse(t, e) {
            const i = new this(t, e);
            return i.parse(), i;
        }
        constructor(t) {
            let { referenceElement: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            super(...arguments),
                (this.html = t),
                (this.referenceElement = e),
                (this.blocks = []),
                (this.blockElements = []),
                (this.processedElements = []);
        }
        getDocument() {
            return qe.fromJSON(this.blocks);
        }
        parse() {
            try {
                this.createHiddenContainer();
                const t = Je.sanitize(this.html).getHTML();
                this.containerElement.innerHTML = t;
                const e = S(this.containerElement, { usingFilter: ti });
                for (; e.nextNode(); ) this.processNode(e.currentNode);
                return this.translateBlockElementMarginsToNewlines();
            } finally {
                this.removeHiddenContainer();
            }
        }
        createHiddenContainer() {
            return this.referenceElement
                ? ((this.containerElement = this.referenceElement.cloneNode(
                      !1
                  )),
                  this.containerElement.removeAttribute("id"),
                  this.containerElement.setAttribute("data-trix-internal", ""),
                  (this.containerElement.style.display = "none"),
                  this.referenceElement.parentNode.insertBefore(
                      this.containerElement,
                      this.referenceElement.nextSibling
                  ))
                : ((this.containerElement = k({
                      tagName: "div",
                      style: { display: "none" },
                  })),
                  document.body.appendChild(this.containerElement));
        }
        removeHiddenContainer() {
            return R(this.containerElement);
        }
        processNode(t) {
            switch (t.nodeType) {
                case Node.TEXT_NODE:
                    if (!this.isInsignificantTextNode(t))
                        return (
                            this.appendBlockForTextNode(t),
                            this.processTextNode(t)
                        );
                    break;
                case Node.ELEMENT_NODE:
                    return (
                        this.appendBlockForElement(t), this.processElement(t)
                    );
            }
        }
        appendBlockForTextNode(t) {
            const e = t.parentNode;
            if (
                e === this.currentBlockElement &&
                this.isBlockElement(t.previousSibling)
            )
                return this.appendStringWithAttributes("\n");
            if (e === this.containerElement || this.isBlockElement(e)) {
                var i;
                const t = this.getBlockAttributes(e);
                rt(
                    t,
                    null === (i = this.currentBlock) || void 0 === i
                        ? void 0
                        : i.attributes
                ) ||
                    ((this.currentBlock =
                        this.appendBlockForAttributesWithElement(t, e)),
                    (this.currentBlockElement = e));
            }
        }
        appendBlockForElement(t) {
            const e = this.isBlockElement(t),
                i = y(this.currentBlockElement, t);
            if (e && !this.isBlockElement(t.firstChild)) {
                if (
                    !this.isInsignificantTextNode(t.firstChild) ||
                    !this.isBlockElement(t.firstElementChild)
                ) {
                    const e = this.getBlockAttributes(t);
                    if (t.firstChild) {
                        if (i && rt(e, this.currentBlock.attributes))
                            return this.appendStringWithAttributes("\n");
                        (this.currentBlock =
                            this.appendBlockForAttributesWithElement(e, t)),
                            (this.currentBlockElement = t);
                    }
                }
            } else if (this.currentBlockElement && !i && !e) {
                const e = this.findParentBlockElement(t);
                if (e) return this.appendBlockForElement(e);
                (this.currentBlock = this.appendEmptyBlock()),
                    (this.currentBlockElement = null);
            }
        }
        findParentBlockElement(t) {
            let { parentElement: e } = t;
            for (; e && e !== this.containerElement; ) {
                if (this.isBlockElement(e) && this.blockElements.includes(e))
                    return e;
                e = e.parentElement;
            }
            return null;
        }
        processTextNode(t) {
            let e = t.data;
            var i;
            Ye(t.parentNode) ||
                ((e = qt(e)),
                ni(
                    null === (i = t.previousSibling) || void 0 === i
                        ? void 0
                        : i.textContent
                ) && (e = ei(e)));
            return this.appendStringWithAttributes(
                e,
                this.getTextAttributes(t.parentNode)
            );
        }
        processElement(t) {
            let e;
            if (P(t)) {
                if (((e = $e(t, "attachment")), Object.keys(e).length)) {
                    const i = this.getTextAttributes(t);
                    this.appendAttachmentWithAttributes(e, i),
                        (t.innerHTML = "");
                }
                return this.processedElements.push(t);
            }
            switch (E(t)) {
                case "br":
                    return (
                        this.isExtraBR(t) ||
                            this.isBlockElement(t.nextSibling) ||
                            this.appendStringWithAttributes(
                                "\n",
                                this.getTextAttributes(t)
                            ),
                        this.processedElements.push(t)
                    );
                case "img":
                    e = { url: t.getAttribute("src"), contentType: "image" };
                    const i = ((t) => {
                        const e = t.getAttribute("width"),
                            i = t.getAttribute("height"),
                            n = {};
                        return (
                            e && (n.width = parseInt(e, 10)),
                            i && (n.height = parseInt(i, 10)),
                            n
                        );
                    })(t);
                    for (const t in i) {
                        const n = i[t];
                        e[t] = n;
                    }
                    return (
                        this.appendAttachmentWithAttributes(
                            e,
                            this.getTextAttributes(t)
                        ),
                        this.processedElements.push(t)
                    );
                case "tr":
                    if (this.needsTableSeparator(t))
                        return this.appendStringWithAttributes(
                            j.tableRowSeparator
                        );
                    break;
                case "td":
                    if (this.needsTableSeparator(t))
                        return this.appendStringWithAttributes(
                            j.tableCellSeparator
                        );
            }
        }
        appendBlockForAttributesWithElement(t, e) {
            this.blockElements.push(e);
            const i = (function () {
                return {
                    text: [],
                    attributes:
                        arguments.length > 0 && void 0 !== arguments[0]
                            ? arguments[0]
                            : {},
                };
            })(t);
            return this.blocks.push(i), i;
        }
        appendEmptyBlock() {
            return this.appendBlockForAttributesWithElement([], null);
        }
        appendStringWithAttributes(t, e) {
            return this.appendPiece(Ge(t, e));
        }
        appendAttachmentWithAttributes(t, e) {
            return this.appendPiece(
                (function (t) {
                    return {
                        attachment: t,
                        attributes:
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : {},
                        type: "attachment",
                    };
                })(t, e)
            );
        }
        appendPiece(t) {
            return (
                0 === this.blocks.length && this.appendEmptyBlock(),
                this.blocks[this.blocks.length - 1].text.push(t)
            );
        }
        appendStringToTextAtIndex(t, e) {
            const { text: i } = this.blocks[e],
                n = i[i.length - 1];
            if ("string" !== (null == n ? void 0 : n.type))
                return i.push(Ge(t));
            n.string += t;
        }
        prependStringToTextAtIndex(t, e) {
            const { text: i } = this.blocks[e],
                n = i[0];
            if ("string" !== (null == n ? void 0 : n.type))
                return i.unshift(Ge(t));
            n.string = t + n.string;
        }
        getTextAttributes(t) {
            let e;
            const i = {};
            for (const n in W) {
                const r = W[n];
                if (
                    r.tagName &&
                    A(t, {
                        matchingSelector: r.tagName,
                        untilNode: this.containerElement,
                    })
                )
                    i[n] = !0;
                else if (r.parser) {
                    if (((e = r.parser(t)), e)) {
                        let o = !1;
                        for (const i of this.findBlockElementAncestors(t))
                            if (r.parser(i) === e) {
                                o = !0;
                                break;
                            }
                        o || (i[n] = e);
                    }
                } else
                    r.styleProperty &&
                        ((e = t.style[r.styleProperty]), e && (i[n] = e));
            }
            if (P(t)) {
                const n = $e(t, "attributes");
                for (const t in n) (e = n[t]), (i[t] = e);
            }
            return i;
        }
        getBlockAttributes(t) {
            const e = [];
            for (; t && t !== this.containerElement; ) {
                for (const r in n) {
                    const o = n[r];
                    var i;
                    if (!1 !== o.parse)
                        if (E(t) === o.tagName)
                            ((null !== (i = o.test) &&
                                void 0 !== i &&
                                i.call(o, t)) ||
                                !o.test) &&
                                (e.push(r),
                                o.listAttribute && e.push(o.listAttribute));
                }
                t = t.parentNode;
            }
            return e.reverse();
        }
        findBlockElementAncestors(t) {
            const e = [];
            for (; t && t !== this.containerElement; ) {
                const i = E(t);
                D().includes(i) && e.push(t), (t = t.parentNode);
            }
            return e;
        }
        isBlockElement(t) {
            if (
                (null == t ? void 0 : t.nodeType) === Node.ELEMENT_NODE &&
                !P(t) &&
                !A(t, {
                    matchingSelector: "td",
                    untilNode: this.containerElement,
                })
            )
                return (
                    D().includes(E(t)) ||
                    "block" === window.getComputedStyle(t).display
                );
        }
        isInsignificantTextNode(t) {
            if ((null == t ? void 0 : t.nodeType) !== Node.TEXT_NODE) return;
            if (!ii(t.data)) return;
            const { parentNode: e, previousSibling: i, nextSibling: n } = t;
            return (Qe(e.previousSibling) &&
                !this.isBlockElement(e.previousSibling)) ||
                Ye(e)
                ? void 0
                : !i || this.isBlockElement(i) || !n || this.isBlockElement(n);
        }
        isExtraBR(t) {
            return (
                "br" === E(t) &&
                this.isBlockElement(t.parentNode) &&
                t.parentNode.lastChild === t
            );
        }
        needsTableSeparator(t) {
            if (j.removeBlankTableCells) {
                var e;
                const i =
                    null === (e = t.previousSibling) || void 0 === e
                        ? void 0
                        : e.textContent;
                return i && /\S/.test(i);
            }
            return t.previousSibling;
        }
        translateBlockElementMarginsToNewlines() {
            const t = this.getMarginOfDefaultBlockElement();
            for (let e = 0; e < this.blocks.length; e++) {
                const i = this.getMarginOfBlockElementAtIndex(e);
                i &&
                    (i.top > 2 * t.top &&
                        this.prependStringToTextAtIndex("\n", e),
                    i.bottom > 2 * t.bottom &&
                        this.appendStringToTextAtIndex("\n", e));
            }
        }
        getMarginOfBlockElementAtIndex(t) {
            const e = this.blockElements[t];
            if (
                e &&
                e.textContent &&
                !D().includes(E(e)) &&
                !this.processedElements.includes(e)
            )
                return Ze(e);
        }
        getMarginOfDefaultBlockElement() {
            const t = k(n.default.tagName);
            return this.containerElement.appendChild(t), Ze(t);
        }
    }
    const Ye = function (t) {
            const { whiteSpace: e } = window.getComputedStyle(t);
            return ["pre", "pre-wrap", "pre-line"].includes(e);
        },
        Qe = (t) => t && !ni(t.textContent),
        Ze = function (t) {
            const e = window.getComputedStyle(t);
            if ("block" === e.display)
                return {
                    top: parseInt(e.marginTop),
                    bottom: parseInt(e.marginBottom),
                };
        },
        ti = function (t) {
            return "style" === E(t)
                ? NodeFilter.FILTER_REJECT
                : NodeFilter.FILTER_ACCEPT;
        },
        ei = (t) => t.replace(new RegExp("^".concat(Ut.source, "+")), ""),
        ii = (t) => new RegExp("^".concat(Ut.source, "*$")).test(t),
        ni = (t) => /\s$/.test(t),
        ri = [
            "contenteditable",
            "data-trix-id",
            "data-trix-store-key",
            "data-trix-mutable",
            "data-trix-placeholder",
            "tabindex",
        ],
        oi = "data-trix-serialized-attributes",
        si = "[".concat(oi, "]"),
        ai = new RegExp("\x3c!--block--\x3e", "g"),
        li = {
            "application/json": function (t) {
                let e;
                if (t instanceof qe) e = t;
                else {
                    if (!(t instanceof HTMLElement))
                        throw new Error("unserializable object");
                    e = Xe.parse(t.innerHTML).getDocument();
                }
                return e.toSerializableDocument().toJSONString();
            },
            "text/html": function (t) {
                let e;
                if (t instanceof qe) e = ge.render(t);
                else {
                    if (!(t instanceof HTMLElement))
                        throw new Error("unserializable object");
                    e = t.cloneNode(!0);
                }
                return (
                    Array.from(
                        e.querySelectorAll("[data-trix-serialize=false]")
                    ).forEach((t) => {
                        R(t);
                    }),
                    ri.forEach((t) => {
                        Array.from(
                            e.querySelectorAll("[".concat(t, "]"))
                        ).forEach((e) => {
                            e.removeAttribute(t);
                        });
                    }),
                    Array.from(e.querySelectorAll(si)).forEach((t) => {
                        try {
                            const e = JSON.parse(t.getAttribute(oi));
                            t.removeAttribute(oi);
                            for (const i in e) {
                                const n = e[i];
                                t.setAttribute(i, n);
                            }
                        } catch (t) {}
                    }),
                    e.innerHTML.replace(ai, "")
                );
            },
        };
    var ci = Object.freeze({ __proto__: null });
    class ui extends z {
        constructor(t, e) {
            super(...arguments),
                (this.attachmentManager = t),
                (this.attachment = e),
                (this.id = this.attachment.id),
                (this.file = this.attachment.file);
        }
        remove() {
            return this.attachmentManager.requestRemovalOfAttachment(
                this.attachment
            );
        }
    }
    ui.proxyMethod("attachment.getAttribute"),
        ui.proxyMethod("attachment.hasAttribute"),
        ui.proxyMethod("attachment.setAttribute"),
        ui.proxyMethod("attachment.getAttributes"),
        ui.proxyMethod("attachment.setAttributes"),
        ui.proxyMethod("attachment.isPending"),
        ui.proxyMethod("attachment.isPreviewable"),
        ui.proxyMethod("attachment.getURL"),
        ui.proxyMethod("attachment.getHref"),
        ui.proxyMethod("attachment.getFilename"),
        ui.proxyMethod("attachment.getFilesize"),
        ui.proxyMethod("attachment.getFormattedFilesize"),
        ui.proxyMethod("attachment.getExtension"),
        ui.proxyMethod("attachment.getContentType"),
        ui.proxyMethod("attachment.getFile"),
        ui.proxyMethod("attachment.setFile"),
        ui.proxyMethod("attachment.releaseFile"),
        ui.proxyMethod("attachment.getUploadProgress"),
        ui.proxyMethod("attachment.setUploadProgress");
    class hi extends z {
        constructor() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : [];
            super(...arguments),
                (this.managedAttachments = {}),
                Array.from(t).forEach((t) => {
                    this.manageAttachment(t);
                });
        }
        getAttachments() {
            const t = [];
            for (const e in this.managedAttachments) {
                const i = this.managedAttachments[e];
                t.push(i);
            }
            return t;
        }
        manageAttachment(t) {
            return (
                this.managedAttachments[t.id] ||
                    (this.managedAttachments[t.id] = new ui(this, t)),
                this.managedAttachments[t.id]
            );
        }
        attachmentIsManaged(t) {
            return t.id in this.managedAttachments;
        }
        requestRemovalOfAttachment(t) {
            var e, i;
            if (this.attachmentIsManaged(t))
                return null === (e = this.delegate) ||
                    void 0 === e ||
                    null ===
                        (i =
                            e.attachmentManagerDidRequestRemovalOfAttachment) ||
                    void 0 === i
                    ? void 0
                    : i.call(e, t);
        }
        unmanageAttachment(t) {
            const e = this.managedAttachments[t.id];
            return delete this.managedAttachments[t.id], e;
        }
    }
    class di {
        constructor(t) {
            (this.composition = t), (this.document = this.composition.document);
            const e = this.composition.getSelectedRange();
            (this.startPosition = e[0]),
                (this.endPosition = e[1]),
                (this.startLocation = this.document.locationFromPosition(
                    this.startPosition
                )),
                (this.endLocation = this.document.locationFromPosition(
                    this.endPosition
                )),
                (this.block = this.document.getBlockAtIndex(
                    this.endLocation.index
                )),
                (this.breaksOnReturn = this.block.breaksOnReturn()),
                (this.previousCharacter = this.block.text.getStringAtPosition(
                    this.endLocation.offset - 1
                )),
                (this.nextCharacter = this.block.text.getStringAtPosition(
                    this.endLocation.offset
                ));
        }
        shouldInsertBlockBreak() {
            return this.block.hasAttributes() &&
                this.block.isListItem() &&
                !this.block.isEmpty()
                ? 0 !== this.startLocation.offset
                : this.breaksOnReturn && "\n" !== this.nextCharacter;
        }
        shouldBreakFormattedBlock() {
            return (
                this.block.hasAttributes() &&
                !this.block.isListItem() &&
                ((this.breaksOnReturn && "\n" === this.nextCharacter) ||
                    "\n" === this.previousCharacter)
            );
        }
        shouldDecreaseListLevel() {
            return (
                this.block.hasAttributes() &&
                this.block.isListItem() &&
                this.block.isEmpty()
            );
        }
        shouldPrependListItem() {
            return (
                this.block.isListItem() &&
                0 === this.startLocation.offset &&
                !this.block.isEmpty()
            );
        }
        shouldRemoveLastBlockAttribute() {
            return (
                this.block.hasAttributes() &&
                !this.block.isListItem() &&
                this.block.isEmpty()
            );
        }
    }
    class gi extends z {
        constructor() {
            super(...arguments),
                (this.document = new qe()),
                (this.attachments = []),
                (this.currentAttributes = {}),
                (this.revision = 0);
        }
        setDocument(t) {
            var e, i;
            if (!t.isEqualTo(this.document))
                return (
                    (this.document = t),
                    this.refreshAttachments(),
                    this.revision++,
                    null === (e = this.delegate) ||
                    void 0 === e ||
                    null === (i = e.compositionDidChangeDocument) ||
                    void 0 === i
                        ? void 0
                        : i.call(e, t)
                );
        }
        getSnapshot() {
            return {
                document: this.document,
                selectedRange: this.getSelectedRange(),
            };
        }
        loadSnapshot(t) {
            var e, i, n, r;
            let { document: o, selectedRange: s } = t;
            return (
                null === (e = this.delegate) ||
                    void 0 === e ||
                    null === (i = e.compositionWillLoadSnapshot) ||
                    void 0 === i ||
                    i.call(e),
                this.setDocument(null != o ? o : new qe()),
                this.setSelection(null != s ? s : [0, 0]),
                null === (n = this.delegate) ||
                void 0 === n ||
                null === (r = n.compositionDidLoadSnapshot) ||
                void 0 === r
                    ? void 0
                    : r.call(n)
            );
        }
        insertText(t) {
            let { updatePosition: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : { updatePosition: !0 };
            const i = this.getSelectedRange();
            this.setDocument(this.document.insertTextAtRange(t, i));
            const n = i[0],
                r = n + t.getLength();
            return (
                e && this.setSelection(r),
                this.notifyDelegateOfInsertionAtRange([n, r])
            );
        }
        insertBlock() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : new Be();
            const e = new qe([t]);
            return this.insertDocument(e);
        }
        insertDocument() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : new qe();
            const e = this.getSelectedRange();
            this.setDocument(this.document.insertDocumentAtRange(t, e));
            const i = e[0],
                n = i + t.getLength();
            return (
                this.setSelection(n),
                this.notifyDelegateOfInsertionAtRange([i, n])
            );
        }
        insertString(t, e) {
            const i = this.getCurrentTextAttributes(),
                n = Te.textForStringWithAttributes(t, i);
            return this.insertText(n, e);
        }
        insertBlockBreak() {
            const t = this.getSelectedRange();
            this.setDocument(this.document.insertBlockBreakAtRange(t));
            const e = t[0],
                i = e + 1;
            return (
                this.setSelection(i),
                this.notifyDelegateOfInsertionAtRange([e, i])
            );
        }
        insertLineBreak() {
            const t = new di(this);
            if (t.shouldDecreaseListLevel())
                return (
                    this.decreaseListLevel(), this.setSelection(t.startPosition)
                );
            if (t.shouldPrependListItem()) {
                const e = new qe([t.block.copyWithoutText()]);
                return this.insertDocument(e);
            }
            return t.shouldInsertBlockBreak()
                ? this.insertBlockBreak()
                : t.shouldRemoveLastBlockAttribute()
                ? this.removeLastBlockAttribute()
                : t.shouldBreakFormattedBlock()
                ? this.breakFormattedBlock(t)
                : this.insertString("\n");
        }
        insertHTML(t) {
            const e = Xe.parse(t).getDocument(),
                i = this.getSelectedRange();
            this.setDocument(this.document.mergeDocumentAtRange(e, i));
            const n = i[0],
                r = n + e.getLength() - 1;
            return (
                this.setSelection(r),
                this.notifyDelegateOfInsertionAtRange([n, r])
            );
        }
        replaceHTML(t) {
            const e = Xe.parse(t)
                    .getDocument()
                    .copyUsingObjectsFromDocument(this.document),
                i = this.getLocationRange({ strict: !1 }),
                n = this.document.rangeFromLocationRange(i);
            return this.setDocument(e), this.setSelection(n);
        }
        insertFile(t) {
            return this.insertFiles([t]);
        }
        insertFiles(t) {
            const e = [];
            return (
                Array.from(t).forEach((t) => {
                    var i;
                    if (
                        null !== (i = this.delegate) &&
                        void 0 !== i &&
                        i.compositionShouldAcceptFile(t)
                    ) {
                        const i = Re.attachmentForFile(t);
                        e.push(i);
                    }
                }),
                this.insertAttachments(e)
            );
        }
        insertAttachment(t) {
            return this.insertAttachments([t]);
        }
        insertAttachments(t) {
            let e = new Te();
            return (
                Array.from(t).forEach((t) => {
                    var n;
                    const r = t.getType(),
                        o =
                            null === (n = i[r]) || void 0 === n
                                ? void 0
                                : n.presentation,
                        s = this.getCurrentTextAttributes();
                    o && (s.presentation = o);
                    const a = Te.textForAttachmentWithAttributes(t, s);
                    e = e.appendText(a);
                }),
                this.insertText(e)
            );
        }
        shouldManageDeletingInDirection(t) {
            const e = this.getLocationRange();
            if (Dt(e)) {
                if ("backward" === t && 0 === e[0].offset) return !0;
                if (this.shouldManageMovingCursorInDirection(t)) return !0;
            } else if (e[0].index !== e[1].index) return !0;
            return !1;
        }
        deleteInDirection(t) {
            let e,
                i,
                n,
                { length: r } =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {};
            const o = this.getLocationRange();
            let s = this.getSelectedRange();
            const a = Dt(s);
            if (
                (a
                    ? (i = "backward" === t && 0 === o[0].offset)
                    : (n = o[0].index !== o[1].index),
                i && this.canDecreaseBlockAttributeLevel())
            ) {
                const t = this.getBlock();
                if (
                    (t.isListItem()
                        ? this.decreaseListLevel()
                        : this.decreaseBlockAttributeLevel(),
                    this.setSelection(s[0]),
                    t.isEmpty())
                )
                    return !1;
            }
            return (
                a &&
                    ((s = this.getExpandedRangeInDirection(t, { length: r })),
                    "backward" === t && (e = this.getAttachmentAtRange(s))),
                e
                    ? (this.editAttachment(e), !1)
                    : (this.setDocument(this.document.removeTextAtRange(s)),
                      this.setSelection(s[0]),
                      !i && !n && void 0)
            );
        }
        moveTextFromRange(t) {
            const [e] = Array.from(this.getSelectedRange());
            return (
                this.setDocument(
                    this.document.moveTextFromRangeToPosition(t, e)
                ),
                this.setSelection(e)
            );
        }
        removeAttachment(t) {
            const e = this.document.getRangeOfAttachment(t);
            if (e)
                return (
                    this.stopEditingAttachment(),
                    this.setDocument(this.document.removeTextAtRange(e)),
                    this.setSelection(e[0])
                );
        }
        removeLastBlockAttribute() {
            const [t, e] = Array.from(this.getSelectedRange()),
                i = this.document.getBlockAtPosition(e);
            return (
                this.removeCurrentAttribute(i.getLastAttribute()),
                this.setSelection(t)
            );
        }
        insertPlaceholder() {
            return (
                (this.placeholderPosition = this.getPosition()),
                this.insertString(" ")
            );
        }
        selectPlaceholder() {
            if (null != this.placeholderPosition)
                return (
                    this.setSelectedRange([
                        this.placeholderPosition,
                        this.placeholderPosition + 1,
                    ]),
                    this.getSelectedRange()
                );
        }
        forgetPlaceholder() {
            this.placeholderPosition = null;
        }
        hasCurrentAttribute(t) {
            const e = this.currentAttributes[t];
            return null != e && !1 !== e;
        }
        toggleCurrentAttribute(t) {
            const e = !this.currentAttributes[t];
            return e
                ? this.setCurrentAttribute(t, e)
                : this.removeCurrentAttribute(t);
        }
        canSetCurrentAttribute(t) {
            return gt(t)
                ? this.canSetCurrentBlockAttribute(t)
                : this.canSetCurrentTextAttribute(t);
        }
        canSetCurrentTextAttribute(t) {
            const e = this.getSelectedDocument();
            if (e) {
                for (const t of Array.from(e.getAttachments()))
                    if (!t.hasContent()) return !1;
                return !0;
            }
        }
        canSetCurrentBlockAttribute(t) {
            const e = this.getBlock();
            if (e) return !e.isTerminalBlock();
        }
        setCurrentAttribute(t, e) {
            return gt(t)
                ? this.setBlockAttribute(t, e)
                : (this.setTextAttribute(t, e),
                  (this.currentAttributes[t] = e),
                  this.notifyDelegateOfCurrentAttributesChange());
        }
        setTextAttribute(t, e) {
            const i = this.getSelectedRange();
            if (!i) return;
            const [n, r] = Array.from(i);
            if (n !== r)
                return this.setDocument(
                    this.document.addAttributeAtRange(t, e, i)
                );
            if ("href" === t) {
                const t = Te.textForStringWithAttributes(e, { href: e });
                return this.insertText(t);
            }
        }
        setBlockAttribute(t, e) {
            const i = this.getSelectedRange();
            if (this.canSetCurrentAttribute(t))
                return (
                    this.setDocument(
                        this.document.applyBlockAttributeAtRange(t, e, i)
                    ),
                    this.setSelection(i)
                );
        }
        removeCurrentAttribute(t) {
            return gt(t)
                ? (this.removeBlockAttribute(t), this.updateCurrentAttributes())
                : (this.removeTextAttribute(t),
                  delete this.currentAttributes[t],
                  this.notifyDelegateOfCurrentAttributesChange());
        }
        removeTextAttribute(t) {
            const e = this.getSelectedRange();
            if (e)
                return this.setDocument(
                    this.document.removeAttributeAtRange(t, e)
                );
        }
        removeBlockAttribute(t) {
            const e = this.getSelectedRange();
            if (e)
                return this.setDocument(
                    this.document.removeAttributeAtRange(t, e)
                );
        }
        canDecreaseNestingLevel() {
            var t;
            return (
                (null === (t = this.getBlock()) || void 0 === t
                    ? void 0
                    : t.getNestingLevel()) > 0
            );
        }
        canIncreaseNestingLevel() {
            var t;
            const e = this.getBlock();
            if (e) {
                if (
                    null === (t = gt(e.getLastNestableAttribute())) ||
                    void 0 === t ||
                    !t.listAttribute
                )
                    return e.getNestingLevel() > 0;
                {
                    const t = this.getPreviousBlock();
                    if (t)
                        return (function () {
                            let t =
                                arguments.length > 1 && void 0 !== arguments[1]
                                    ? arguments[1]
                                    : [];
                            return rt(
                                (arguments.length > 0 && void 0 !== arguments[0]
                                    ? arguments[0]
                                    : []
                                ).slice(0, t.length),
                                t
                            );
                        })(
                            t.getListItemAttributes(),
                            e.getListItemAttributes()
                        );
                }
            }
        }
        decreaseNestingLevel() {
            const t = this.getBlock();
            if (t)
                return this.setDocument(
                    this.document.replaceBlock(t, t.decreaseNestingLevel())
                );
        }
        increaseNestingLevel() {
            const t = this.getBlock();
            if (t)
                return this.setDocument(
                    this.document.replaceBlock(t, t.increaseNestingLevel())
                );
        }
        canDecreaseBlockAttributeLevel() {
            var t;
            return (
                (null === (t = this.getBlock()) || void 0 === t
                    ? void 0
                    : t.getAttributeLevel()) > 0
            );
        }
        decreaseBlockAttributeLevel() {
            var t;
            const e =
                null === (t = this.getBlock()) || void 0 === t
                    ? void 0
                    : t.getLastAttribute();
            if (e) return this.removeCurrentAttribute(e);
        }
        decreaseListLevel() {
            let [t] = Array.from(this.getSelectedRange());
            const { index: e } = this.document.locationFromPosition(t);
            let i = e;
            const n = this.getBlock().getAttributeLevel();
            let r = this.document.getBlockAtIndex(i + 1);
            for (; r && r.isListItem() && !(r.getAttributeLevel() <= n); )
                i++, (r = this.document.getBlockAtIndex(i + 1));
            t = this.document.positionFromLocation({ index: e, offset: 0 });
            const o = this.document.positionFromLocation({
                index: i,
                offset: 0,
            });
            return this.setDocument(
                this.document.removeLastListAttributeAtRange([t, o])
            );
        }
        updateCurrentAttributes() {
            const t = this.getSelectedRange({ ignoreLock: !0 });
            if (t) {
                const e = this.document.getCommonAttributesAtRange(t);
                if (
                    (Array.from(dt()).forEach((t) => {
                        e[t] || this.canSetCurrentAttribute(t) || (e[t] = !1);
                    }),
                    !kt(e, this.currentAttributes))
                )
                    return (
                        (this.currentAttributes = e),
                        this.notifyDelegateOfCurrentAttributesChange()
                    );
            }
        }
        getCurrentAttributes() {
            return g.call({}, this.currentAttributes);
        }
        getCurrentTextAttributes() {
            const t = {};
            for (const e in this.currentAttributes) {
                const i = this.currentAttributes[e];
                !1 !== i && pt(e) && (t[e] = i);
            }
            return t;
        }
        freezeSelection() {
            return this.setCurrentAttribute("frozen", !0);
        }
        thawSelection() {
            return this.removeCurrentAttribute("frozen");
        }
        hasFrozenSelection() {
            return this.hasCurrentAttribute("frozen");
        }
        setSelection(t) {
            var e;
            const i = this.document.locationRangeFromRange(t);
            return null === (e = this.delegate) || void 0 === e
                ? void 0
                : e.compositionDidRequestChangingSelectionToLocationRange(i);
        }
        getSelectedRange() {
            const t = this.getLocationRange();
            if (t) return this.document.rangeFromLocationRange(t);
        }
        setSelectedRange(t) {
            const e = this.document.locationRangeFromRange(t);
            return this.getSelectionManager().setLocationRange(e);
        }
        getPosition() {
            const t = this.getLocationRange();
            if (t) return this.document.positionFromLocation(t[0]);
        }
        getLocationRange(t) {
            return this.targetLocationRange
                ? this.targetLocationRange
                : this.getSelectionManager().getLocationRange(t) ||
                      Lt({ index: 0, offset: 0 });
        }
        withTargetLocationRange(t, e) {
            let i;
            this.targetLocationRange = t;
            try {
                i = e();
            } finally {
                this.targetLocationRange = null;
            }
            return i;
        }
        withTargetRange(t, e) {
            const i = this.document.locationRangeFromRange(t);
            return this.withTargetLocationRange(i, e);
        }
        withTargetDOMRange(t, e) {
            const i = this.createLocationRangeFromDOMRange(t, { strict: !1 });
            return this.withTargetLocationRange(i, e);
        }
        getExpandedRangeInDirection(t) {
            let { length: e } =
                    arguments.length > 1 && void 0 !== arguments[1]
                        ? arguments[1]
                        : {},
                [i, n] = Array.from(this.getSelectedRange());
            return (
                "backward" === t
                    ? e
                        ? (i -= e)
                        : (i = this.translateUTF16PositionFromOffset(i, -1))
                    : e
                    ? (n += e)
                    : (n = this.translateUTF16PositionFromOffset(n, 1)),
                Lt([i, n])
            );
        }
        shouldManageMovingCursorInDirection(t) {
            if (this.editingAttachment) return !0;
            const e = this.getExpandedRangeInDirection(t);
            return null != this.getAttachmentAtRange(e);
        }
        moveCursorInDirection(t) {
            let e, i;
            if (this.editingAttachment)
                i = this.document.getRangeOfAttachment(this.editingAttachment);
            else {
                const n = this.getSelectedRange();
                (i = this.getExpandedRangeInDirection(t)), (e = !wt(n, i));
            }
            if (
                ("backward" === t
                    ? this.setSelectedRange(i[0])
                    : this.setSelectedRange(i[1]),
                e)
            ) {
                const t = this.getAttachmentAtRange(i);
                if (t) return this.editAttachment(t);
            }
        }
        expandSelectionInDirection(t) {
            let { length: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            const i = this.getExpandedRangeInDirection(t, { length: e });
            return this.setSelectedRange(i);
        }
        expandSelectionForEditing() {
            if (this.hasCurrentAttribute("href"))
                return this.expandSelectionAroundCommonAttribute("href");
        }
        expandSelectionAroundCommonAttribute(t) {
            const e = this.getPosition(),
                i = this.document.getRangeOfCommonAttributeAtPosition(t, e);
            return this.setSelectedRange(i);
        }
        selectionContainsAttachments() {
            var t;
            return (
                (null === (t = this.getSelectedAttachments()) || void 0 === t
                    ? void 0
                    : t.length) > 0
            );
        }
        selectionIsInCursorTarget() {
            return (
                this.editingAttachment ||
                this.positionIsCursorTarget(this.getPosition())
            );
        }
        positionIsCursorTarget(t) {
            const e = this.document.locationFromPosition(t);
            if (e) return this.locationIsCursorTarget(e);
        }
        positionIsBlockBreak(t) {
            var e;
            return null === (e = this.document.getPieceAtPosition(t)) ||
                void 0 === e
                ? void 0
                : e.isBlockBreak();
        }
        getSelectedDocument() {
            const t = this.getSelectedRange();
            if (t) return this.document.getDocumentAtRange(t);
        }
        getSelectedAttachments() {
            var t;
            return null === (t = this.getSelectedDocument()) || void 0 === t
                ? void 0
                : t.getAttachments();
        }
        getAttachments() {
            return this.attachments.slice(0);
        }
        refreshAttachments() {
            const t = this.document.getAttachments(),
                { added: e, removed: i } = (function () {
                    let t =
                            arguments.length > 0 && void 0 !== arguments[0]
                                ? arguments[0]
                                : [],
                        e =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : [];
                    const i = [],
                        n = [],
                        r = new Set();
                    t.forEach((t) => {
                        r.add(t);
                    });
                    const o = new Set();
                    return (
                        e.forEach((t) => {
                            o.add(t), r.has(t) || i.push(t);
                        }),
                        t.forEach((t) => {
                            o.has(t) || n.push(t);
                        }),
                        { added: i, removed: n }
                    );
                })(this.attachments, t);
            return (
                (this.attachments = t),
                Array.from(i).forEach((t) => {
                    var e, i;
                    (t.delegate = null),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            null === (i = e.compositionDidRemoveAttachment) ||
                            void 0 === i ||
                            i.call(e, t);
                }),
                (() => {
                    const t = [];
                    return (
                        Array.from(e).forEach((e) => {
                            var i, n;
                            (e.delegate = this),
                                t.push(
                                    null === (i = this.delegate) ||
                                        void 0 === i ||
                                        null ===
                                            (n =
                                                i.compositionDidAddAttachment) ||
                                        void 0 === n
                                        ? void 0
                                        : n.call(i, e)
                                );
                        }),
                        t
                    );
                })()
            );
        }
        attachmentDidChangeAttributes(t) {
            var e, i;
            return (
                this.revision++,
                null === (e = this.delegate) ||
                void 0 === e ||
                null === (i = e.compositionDidEditAttachment) ||
                void 0 === i
                    ? void 0
                    : i.call(e, t)
            );
        }
        attachmentDidChangePreviewURL(t) {
            var e, i;
            return (
                this.revision++,
                null === (e = this.delegate) ||
                void 0 === e ||
                null === (i = e.compositionDidChangeAttachmentPreviewURL) ||
                void 0 === i
                    ? void 0
                    : i.call(e, t)
            );
        }
        editAttachment(t, e) {
            var i, n;
            if (t !== this.editingAttachment)
                return (
                    this.stopEditingAttachment(),
                    (this.editingAttachment = t),
                    null === (i = this.delegate) ||
                    void 0 === i ||
                    null === (n = i.compositionDidStartEditingAttachment) ||
                    void 0 === n
                        ? void 0
                        : n.call(i, this.editingAttachment, e)
                );
        }
        stopEditingAttachment() {
            var t, e;
            this.editingAttachment &&
                (null === (t = this.delegate) ||
                    void 0 === t ||
                    null === (e = t.compositionDidStopEditingAttachment) ||
                    void 0 === e ||
                    e.call(t, this.editingAttachment),
                (this.editingAttachment = null));
        }
        updateAttributesForAttachment(t, e) {
            return this.setDocument(
                this.document.updateAttributesForAttachment(t, e)
            );
        }
        removeAttributeForAttachment(t, e) {
            return this.setDocument(
                this.document.removeAttributeForAttachment(t, e)
            );
        }
        breakFormattedBlock(t) {
            let { document: e } = t;
            const { block: i } = t;
            let n = t.startPosition,
                r = [n - 1, n];
            i.getBlockBreakPosition() === t.startLocation.offset
                ? (i.breaksOnReturn() && "\n" === t.nextCharacter
                      ? (n += 1)
                      : (e = e.removeTextAtRange(r)),
                  (r = [n, n]))
                : "\n" === t.nextCharacter
                ? "\n" === t.previousCharacter
                    ? (r = [n - 1, n + 1])
                    : ((r = [n, n + 1]), (n += 1))
                : t.startLocation.offset - 1 != 0 && (n += 1);
            const o = new qe([i.removeLastAttribute().copyWithoutText()]);
            return (
                this.setDocument(e.insertDocumentAtRange(o, r)),
                this.setSelection(n)
            );
        }
        getPreviousBlock() {
            const t = this.getLocationRange();
            if (t) {
                const { index: e } = t[0];
                if (e > 0) return this.document.getBlockAtIndex(e - 1);
            }
        }
        getBlock() {
            const t = this.getLocationRange();
            if (t) return this.document.getBlockAtIndex(t[0].index);
        }
        getAttachmentAtRange(t) {
            const e = this.document.getDocumentAtRange(t);
            if (e.toString() === "".concat("￼", "\n"))
                return e.getAttachments()[0];
        }
        notifyDelegateOfCurrentAttributesChange() {
            var t, e;
            return null === (t = this.delegate) ||
                void 0 === t ||
                null === (e = t.compositionDidChangeCurrentAttributes) ||
                void 0 === e
                ? void 0
                : e.call(t, this.currentAttributes);
        }
        notifyDelegateOfInsertionAtRange(t) {
            var e, i;
            return null === (e = this.delegate) ||
                void 0 === e ||
                null === (i = e.compositionDidPerformInsertionAtRange) ||
                void 0 === i
                ? void 0
                : i.call(e, t);
        }
        translateUTF16PositionFromOffset(t, e) {
            const i = this.document.toUTF16String(),
                n = i.offsetFromUCS2Offset(t);
            return i.offsetToUCS2Offset(n + e);
        }
    }
    gi.proxyMethod("getSelectionManager().getPointRange"),
        gi.proxyMethod("getSelectionManager().setLocationRangeFromPointRange"),
        gi.proxyMethod("getSelectionManager().createLocationRangeFromDOMRange"),
        gi.proxyMethod("getSelectionManager().locationIsCursorTarget"),
        gi.proxyMethod("getSelectionManager().selectionIsExpanded"),
        gi.proxyMethod("delegate?.getSelectionManager");
    class mi extends z {
        constructor(t) {
            super(...arguments),
                (this.composition = t),
                (this.undoEntries = []),
                (this.redoEntries = []);
        }
        recordUndoEntry(t) {
            let { context: e, consolidatable: i } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            const n = this.undoEntries.slice(-1)[0];
            if (!i || !pi(n, t, e)) {
                const i = this.createEntry({ description: t, context: e });
                this.undoEntries.push(i), (this.redoEntries = []);
            }
        }
        undo() {
            const t = this.undoEntries.pop();
            if (t) {
                const e = this.createEntry(t);
                return (
                    this.redoEntries.push(e),
                    this.composition.loadSnapshot(t.snapshot)
                );
            }
        }
        redo() {
            const t = this.redoEntries.pop();
            if (t) {
                const e = this.createEntry(t);
                return (
                    this.undoEntries.push(e),
                    this.composition.loadSnapshot(t.snapshot)
                );
            }
        }
        canUndo() {
            return this.undoEntries.length > 0;
        }
        canRedo() {
            return this.redoEntries.length > 0;
        }
        createEntry() {
            let { description: t, context: e } =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            return {
                description: null == t ? void 0 : t.toString(),
                context: JSON.stringify(e),
                snapshot: this.composition.getSnapshot(),
            };
        }
    }
    const pi = (t, e, i) =>
            (null == t ? void 0 : t.description) ===
                (null == e ? void 0 : e.toString()) &&
            (null == t ? void 0 : t.context) === JSON.stringify(i),
        fi = "attachmentGallery";
    class bi {
        constructor(t) {
            (this.document = t.document),
                (this.selectedRange = t.selectedRange);
        }
        perform() {
            return this.removeBlockAttribute(), this.applyBlockAttribute();
        }
        getSnapshot() {
            return {
                document: this.document,
                selectedRange: this.selectedRange,
            };
        }
        removeBlockAttribute() {
            return this.findRangesOfBlocks().map(
                (t) =>
                    (this.document = this.document.removeAttributeAtRange(
                        fi,
                        t
                    ))
            );
        }
        applyBlockAttribute() {
            let t = 0;
            this.findRangesOfPieces().forEach((e) => {
                e[1] - e[0] > 1 &&
                    ((e[0] += t),
                    (e[1] += t),
                    "\n" !== this.document.getCharacterAtPosition(e[1]) &&
                        ((this.document = this.document.insertBlockBreakAtRange(
                            e[1]
                        )),
                        e[1] < this.selectedRange[1] &&
                            this.moveSelectedRangeForward(),
                        e[1]++,
                        t++),
                    0 !== e[0] &&
                        "\n" !==
                            this.document.getCharacterAtPosition(e[0] - 1) &&
                        ((this.document = this.document.insertBlockBreakAtRange(
                            e[0]
                        )),
                        e[0] < this.selectedRange[0] &&
                            this.moveSelectedRangeForward(),
                        e[0]++,
                        t++),
                    (this.document = this.document.applyBlockAttributeAtRange(
                        fi,
                        !0,
                        e
                    )));
            });
        }
        findRangesOfBlocks() {
            return this.document.findRangesForBlockAttribute(fi);
        }
        findRangesOfPieces() {
            return this.document.findRangesForTextAttribute("presentation", {
                withValue: "gallery",
            });
        }
        moveSelectedRangeForward() {
            (this.selectedRange[0] += 1), (this.selectedRange[1] += 1);
        }
    }
    const vi = function (t) {
            const e = new bi(t);
            return e.perform(), e.getSnapshot();
        },
        Ai = [vi];
    class xi {
        constructor(t, e, i) {
            (this.insertFiles = this.insertFiles.bind(this)),
                (this.composition = t),
                (this.selectionManager = e),
                (this.element = i),
                (this.undoManager = new mi(this.composition)),
                (this.filters = Ai.slice(0));
        }
        loadDocument(t) {
            return this.loadSnapshot({ document: t, selectedRange: [0, 0] });
        }
        loadHTML() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : "";
            const e = Xe.parse(t, {
                referenceElement: this.element,
            }).getDocument();
            return this.loadDocument(e);
        }
        loadJSON(t) {
            let { document: e, selectedRange: i } = t;
            return (
                (e = qe.fromJSON(e)),
                this.loadSnapshot({ document: e, selectedRange: i })
            );
        }
        loadSnapshot(t) {
            return (
                (this.undoManager = new mi(this.composition)),
                this.composition.loadSnapshot(t)
            );
        }
        getDocument() {
            return this.composition.document;
        }
        getSelectedDocument() {
            return this.composition.getSelectedDocument();
        }
        getSnapshot() {
            return this.composition.getSnapshot();
        }
        toJSON() {
            return this.getSnapshot();
        }
        deleteInDirection(t) {
            return this.composition.deleteInDirection(t);
        }
        insertAttachment(t) {
            return this.composition.insertAttachment(t);
        }
        insertAttachments(t) {
            return this.composition.insertAttachments(t);
        }
        insertDocument(t) {
            return this.composition.insertDocument(t);
        }
        insertFile(t) {
            return this.composition.insertFile(t);
        }
        insertFiles(t) {
            return this.composition.insertFiles(t);
        }
        insertHTML(t) {
            return this.composition.insertHTML(t);
        }
        insertString(t) {
            return this.composition.insertString(t);
        }
        insertText(t) {
            return this.composition.insertText(t);
        }
        insertLineBreak() {
            return this.composition.insertLineBreak();
        }
        getSelectedRange() {
            return this.composition.getSelectedRange();
        }
        getPosition() {
            return this.composition.getPosition();
        }
        getClientRectAtPosition(t) {
            const e = this.getDocument().locationRangeFromRange([t, t + 1]);
            return this.selectionManager.getClientRectAtLocationRange(e);
        }
        expandSelectionInDirection(t) {
            return this.composition.expandSelectionInDirection(t);
        }
        moveCursorInDirection(t) {
            return this.composition.moveCursorInDirection(t);
        }
        setSelectedRange(t) {
            return this.composition.setSelectedRange(t);
        }
        activateAttribute(t) {
            let e =
                !(arguments.length > 1 && void 0 !== arguments[1]) ||
                arguments[1];
            return this.composition.setCurrentAttribute(t, e);
        }
        attributeIsActive(t) {
            return this.composition.hasCurrentAttribute(t);
        }
        canActivateAttribute(t) {
            return this.composition.canSetCurrentAttribute(t);
        }
        deactivateAttribute(t) {
            return this.composition.removeCurrentAttribute(t);
        }
        canDecreaseNestingLevel() {
            return this.composition.canDecreaseNestingLevel();
        }
        canIncreaseNestingLevel() {
            return this.composition.canIncreaseNestingLevel();
        }
        decreaseNestingLevel() {
            if (this.canDecreaseNestingLevel())
                return this.composition.decreaseNestingLevel();
        }
        increaseNestingLevel() {
            if (this.canIncreaseNestingLevel())
                return this.composition.increaseNestingLevel();
        }
        canRedo() {
            return this.undoManager.canRedo();
        }
        canUndo() {
            return this.undoManager.canUndo();
        }
        recordUndoEntry(t) {
            let { context: e, consolidatable: i } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : {};
            return this.undoManager.recordUndoEntry(t, {
                context: e,
                consolidatable: i,
            });
        }
        redo() {
            if (this.canRedo()) return this.undoManager.redo();
        }
        undo() {
            if (this.canUndo()) return this.undoManager.undo();
        }
    }
    class yi {
        constructor(t) {
            this.element = t;
        }
        findLocationFromContainerAndOffset(t, e) {
            let { strict: i } =
                    arguments.length > 2 && void 0 !== arguments[2]
                        ? arguments[2]
                        : { strict: !0 },
                n = 0,
                r = !1;
            const o = { index: 0, offset: 0 },
                s = this.findAttachmentElementParentForNode(t);
            s && ((t = s.parentNode), (e = C(s)));
            const a = S(this.element, { usingFilter: Ei });
            for (; a.nextNode(); ) {
                const s = a.currentNode;
                if (s === t && O(t)) {
                    I(s) || (o.offset += e);
                    break;
                }
                if (s.parentNode === t) {
                    if (n++ === e) break;
                } else if (!y(t, s) && n > 0) break;
                T(s, { strict: i })
                    ? (r && o.index++, (o.offset = 0), (r = !0))
                    : (o.offset += Ci(s));
            }
            return o;
        }
        findContainerAndOffsetFromLocation(t) {
            let e, i;
            if (0 === t.index && 0 === t.offset) {
                for (e = this.element, i = 0; e.firstChild; )
                    if (((e = e.firstChild), w(e))) {
                        i = 1;
                        break;
                    }
                return [e, i];
            }
            let [n, r] = this.findNodeAndOffsetFromLocation(t);
            if (n) {
                if (O(n))
                    0 === Ci(n)
                        ? ((e = n.parentNode.parentNode),
                          (i = C(n.parentNode)),
                          I(n, { name: "right" }) && i++)
                        : ((e = n), (i = t.offset - r));
                else {
                    if (((e = n.parentNode), !T(n.previousSibling) && !w(e)))
                        for (
                            ;
                            n === e.lastChild &&
                            ((n = e), (e = e.parentNode), !w(e));

                        );
                    (i = C(n)), 0 !== t.offset && i++;
                }
                return [e, i];
            }
        }
        findNodeAndOffsetFromLocation(t) {
            let e,
                i,
                n = 0;
            for (const r of this.getSignificantNodesForIndex(t.index)) {
                const o = Ci(r);
                if (t.offset <= n + o)
                    if (O(r)) {
                        if (((e = r), (i = n), t.offset === i && I(e))) break;
                    } else e || ((e = r), (i = n));
                if (((n += o), n > t.offset)) break;
            }
            return [e, i];
        }
        findAttachmentElementParentForNode(t) {
            for (; t && t !== this.element; ) {
                if (P(t)) return t;
                t = t.parentNode;
            }
        }
        getSignificantNodesForIndex(t) {
            const e = [],
                i = S(this.element, { usingFilter: Ri });
            let n = !1;
            for (; i.nextNode(); ) {
                const o = i.currentNode;
                var r;
                if (B(o)) {
                    if ((null != r ? r++ : (r = 0), r === t)) n = !0;
                    else if (n) break;
                } else n && e.push(o);
            }
            return e;
        }
    }
    const Ci = function (t) {
            if (t.nodeType === Node.TEXT_NODE) {
                if (I(t)) return 0;
                return t.textContent.length;
            }
            return "br" === E(t) || P(t) ? 1 : 0;
        },
        Ri = function (t) {
            return Si(t) === NodeFilter.FILTER_ACCEPT
                ? Ei(t)
                : NodeFilter.FILTER_REJECT;
        },
        Si = function (t) {
            return N(t) ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT;
        },
        Ei = function (t) {
            return P(t.parentNode)
                ? NodeFilter.FILTER_REJECT
                : NodeFilter.FILTER_ACCEPT;
        };
    class ki {
        createDOMRangeFromPoint(t) {
            let e,
                { x: i, y: n } = t;
            if (document.caretPositionFromPoint) {
                const { offsetNode: t, offset: r } =
                    document.caretPositionFromPoint(i, n);
                return (e = document.createRange()), e.setStart(t, r), e;
            }
            if (document.caretRangeFromPoint)
                return document.caretRangeFromPoint(i, n);
            if (document.body.createTextRange) {
                const t = Nt();
                try {
                    const t = document.body.createTextRange();
                    t.moveToPoint(i, n), t.select();
                } catch (t) {}
                return (e = Nt()), Ot(t), e;
            }
        }
        getClientRectsForDOMRange(t) {
            const e = Array.from(t.getClientRects());
            return [e[0], e[e.length - 1]];
        }
    }
    class Li extends z {
        constructor(t) {
            super(...arguments),
                (this.didMouseDown = this.didMouseDown.bind(this)),
                (this.selectionDidChange = this.selectionDidChange.bind(this)),
                (this.element = t),
                (this.locationMapper = new yi(this.element)),
                (this.pointMapper = new ki()),
                (this.lockCount = 0),
                f("mousedown", {
                    onElement: this.element,
                    withCallback: this.didMouseDown,
                });
        }
        getLocationRange() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            return !1 === t.strict
                ? this.createLocationRangeFromDOMRange(Nt())
                : t.ignoreLock
                ? this.currentLocationRange
                : this.lockedLocationRange
                ? this.lockedLocationRange
                : this.currentLocationRange;
        }
        setLocationRange(t) {
            if (this.lockedLocationRange) return;
            t = Lt(t);
            const e = this.createDOMRangeFromLocationRange(t);
            e && (Ot(e), this.updateCurrentLocationRange(t));
        }
        setLocationRangeFromPointRange(t) {
            t = Lt(t);
            const e = this.getLocationAtPoint(t[0]),
                i = this.getLocationAtPoint(t[1]);
            this.setLocationRange([e, i]);
        }
        getClientRectAtLocationRange(t) {
            const e = this.createDOMRangeFromLocationRange(t);
            if (e) return this.getClientRectsForDOMRange(e)[1];
        }
        locationIsCursorTarget(t) {
            const e = Array.from(this.findNodeAndOffsetFromLocation(t))[0];
            return I(e);
        }
        lock() {
            0 == this.lockCount++ &&
                (this.updateCurrentLocationRange(),
                (this.lockedLocationRange = this.getLocationRange()));
        }
        unlock() {
            if (0 == --this.lockCount) {
                const { lockedLocationRange: t } = this;
                if (((this.lockedLocationRange = null), null != t))
                    return this.setLocationRange(t);
            }
        }
        clearSelection() {
            var t;
            return null === (t = Pt()) || void 0 === t
                ? void 0
                : t.removeAllRanges();
        }
        selectionIsCollapsed() {
            var t;
            return (
                !0 ===
                (null === (t = Nt()) || void 0 === t ? void 0 : t.collapsed)
            );
        }
        selectionIsExpanded() {
            return !this.selectionIsCollapsed();
        }
        createLocationRangeFromDOMRange(t, e) {
            if (null == t || !this.domRangeWithinElement(t)) return;
            const i = this.findLocationFromContainerAndOffset(
                t.startContainer,
                t.startOffset,
                e
            );
            if (!i) return;
            const n = t.collapsed
                ? void 0
                : this.findLocationFromContainerAndOffset(
                      t.endContainer,
                      t.endOffset,
                      e
                  );
            return Lt([i, n]);
        }
        didMouseDown() {
            return this.pauseTemporarily();
        }
        pauseTemporarily() {
            let t;
            this.paused = !0;
            const e = () => {
                    if (
                        ((this.paused = !1),
                        clearTimeout(i),
                        Array.from(t).forEach((t) => {
                            t.destroy();
                        }),
                        y(document, this.element))
                    )
                        return this.selectionDidChange();
                },
                i = setTimeout(e, 200);
            t = ["mousemove", "keydown"].map((t) =>
                f(t, { onElement: document, withCallback: e })
            );
        }
        selectionDidChange() {
            if (!this.paused && !x(this.element))
                return this.updateCurrentLocationRange();
        }
        updateCurrentLocationRange(t) {
            var e, i;
            if (
                (null != t
                    ? t
                    : (t = this.createLocationRangeFromDOMRange(Nt()))) &&
                !wt(t, this.currentLocationRange)
            )
                return (
                    (this.currentLocationRange = t),
                    null === (e = this.delegate) ||
                    void 0 === e ||
                    null === (i = e.locationRangeDidChange) ||
                    void 0 === i
                        ? void 0
                        : i.call(e, this.currentLocationRange.slice(0))
                );
        }
        createDOMRangeFromLocationRange(t) {
            const e = this.findContainerAndOffsetFromLocation(t[0]),
                i = Dt(t)
                    ? e
                    : this.findContainerAndOffsetFromLocation(t[1]) || e;
            if (null != e && null != i) {
                const t = document.createRange();
                return (
                    t.setStart(...Array.from(e || [])),
                    t.setEnd(...Array.from(i || [])),
                    t
                );
            }
        }
        getLocationAtPoint(t) {
            const e = this.createDOMRangeFromPoint(t);
            var i;
            if (e)
                return null === (i = this.createLocationRangeFromDOMRange(e)) ||
                    void 0 === i
                    ? void 0
                    : i[0];
        }
        domRangeWithinElement(t) {
            return t.collapsed
                ? y(this.element, t.startContainer)
                : y(this.element, t.startContainer) &&
                      y(this.element, t.endContainer);
        }
    }
    Li.proxyMethod("locationMapper.findLocationFromContainerAndOffset"),
        Li.proxyMethod("locationMapper.findContainerAndOffsetFromLocation"),
        Li.proxyMethod("locationMapper.findNodeAndOffsetFromLocation"),
        Li.proxyMethod("pointMapper.createDOMRangeFromPoint"),
        Li.proxyMethod("pointMapper.getClientRectsForDOMRange");
    var Di = Object.freeze({
            __proto__: null,
            Attachment: Re,
            AttachmentManager: hi,
            AttachmentPiece: Se,
            Block: Be,
            Composition: gi,
            Document: qe,
            Editor: xi,
            HTMLParser: Xe,
            HTMLSanitizer: Je,
            LineBreakInsertion: di,
            LocationMapper: yi,
            ManagedAttachment: ui,
            Piece: ye,
            PointMapper: ki,
            SelectionManager: Li,
            SplittableList: ke,
            StringPiece: Ee,
            Text: Te,
            UndoManager: mi,
        }),
        wi = Object.freeze({
            __proto__: null,
            ObjectView: ee,
            AttachmentView: re,
            BlockView: de,
            DocumentView: ge,
            PieceView: le,
            PreviewableAttachmentView: ae,
            TextView: ce,
        });
    const { lang: Ti, css: Bi, keyNames: Fi } = V,
        Ii = function (t) {
            return function () {
                const e = t.apply(this, arguments);
                e.do(),
                    this.undos || (this.undos = []),
                    this.undos.push(e.undo);
            };
        };
    class Pi extends z {
        constructor(t, e, i) {
            let n =
                arguments.length > 3 && void 0 !== arguments[3]
                    ? arguments[3]
                    : {};
            super(...arguments),
                Ae(
                    this,
                    "makeElementMutable",
                    Ii(() => ({
                        do: () => {
                            this.element.dataset.trixMutable = !0;
                        },
                        undo: () => delete this.element.dataset.trixMutable,
                    }))
                ),
                Ae(
                    this,
                    "addToolbar",
                    Ii(() => {
                        const t = k({
                            tagName: "div",
                            className: Bi.attachmentToolbar,
                            data: { trixMutable: !0 },
                            childNodes: k({
                                tagName: "div",
                                className: "trix-button-row",
                                childNodes: k({
                                    tagName: "span",
                                    className:
                                        "trix-button-group trix-button-group--actions",
                                    childNodes: k({
                                        tagName: "button",
                                        className:
                                            "trix-button trix-button--remove",
                                        textContent: Ti.remove,
                                        attributes: { title: Ti.remove },
                                        data: { trixAction: "remove" },
                                    }),
                                }),
                            }),
                        });
                        return (
                            this.attachment.isPreviewable() &&
                                t.appendChild(
                                    k({
                                        tagName: "div",
                                        className:
                                            Bi.attachmentMetadataContainer,
                                        childNodes: k({
                                            tagName: "span",
                                            className: Bi.attachmentMetadata,
                                            childNodes: [
                                                k({
                                                    tagName: "span",
                                                    className:
                                                        Bi.attachmentName,
                                                    textContent:
                                                        this.attachment.getFilename(),
                                                    attributes: {
                                                        title: this.attachment.getFilename(),
                                                    },
                                                }),
                                                k({
                                                    tagName: "span",
                                                    className:
                                                        Bi.attachmentSize,
                                                    textContent:
                                                        this.attachment.getFormattedFilesize(),
                                                }),
                                            ],
                                        }),
                                    })
                                ),
                            f("click", {
                                onElement: t,
                                withCallback: this.didClickToolbar,
                            }),
                            f("click", {
                                onElement: t,
                                matchingSelector: "[data-trix-action]",
                                withCallback: this.didClickActionButton,
                            }),
                            b("trix-attachment-before-toolbar", {
                                onElement: this.element,
                                attributes: {
                                    toolbar: t,
                                    attachment: this.attachment,
                                },
                            }),
                            {
                                do: () => this.element.appendChild(t),
                                undo: () => R(t),
                            }
                        );
                    })
                ),
                Ae(
                    this,
                    "installCaptionEditor",
                    Ii(() => {
                        const t = k({
                            tagName: "textarea",
                            className: Bi.attachmentCaptionEditor,
                            attributes: { placeholder: Ti.captionPlaceholder },
                            data: { trixMutable: !0 },
                        });
                        t.value = this.attachmentPiece.getCaption();
                        const e = t.cloneNode();
                        e.classList.add("trix-autoresize-clone"),
                            (e.tabIndex = -1);
                        const i = function () {
                            (e.value = t.value),
                                (t.style.height = e.scrollHeight + "px");
                        };
                        f("input", { onElement: t, withCallback: i }),
                            f("input", {
                                onElement: t,
                                withCallback: this.didInputCaption,
                            }),
                            f("keydown", {
                                onElement: t,
                                withCallback: this.didKeyDownCaption,
                            }),
                            f("change", {
                                onElement: t,
                                withCallback: this.didChangeCaption,
                            }),
                            f("blur", {
                                onElement: t,
                                withCallback: this.didBlurCaption,
                            });
                        const n = this.element.querySelector("figcaption"),
                            r = n.cloneNode();
                        return {
                            do: () => {
                                if (
                                    ((n.style.display = "none"),
                                    r.appendChild(t),
                                    r.appendChild(e),
                                    r.classList.add(
                                        "".concat(
                                            Bi.attachmentCaption,
                                            "--editing"
                                        )
                                    ),
                                    n.parentElement.insertBefore(r, n),
                                    i(),
                                    this.options.editCaption)
                                )
                                    return St(() => t.focus());
                            },
                            undo() {
                                R(r), (n.style.display = null);
                            },
                        };
                    })
                ),
                (this.didClickToolbar = this.didClickToolbar.bind(this)),
                (this.didClickActionButton =
                    this.didClickActionButton.bind(this)),
                (this.didKeyDownCaption = this.didKeyDownCaption.bind(this)),
                (this.didInputCaption = this.didInputCaption.bind(this)),
                (this.didChangeCaption = this.didChangeCaption.bind(this)),
                (this.didBlurCaption = this.didBlurCaption.bind(this)),
                (this.attachmentPiece = t),
                (this.element = e),
                (this.container = i),
                (this.options = n),
                (this.attachment = this.attachmentPiece.attachment),
                "a" === E(this.element) &&
                    (this.element = this.element.firstChild),
                this.install();
        }
        install() {
            this.makeElementMutable(),
                this.addToolbar(),
                this.attachment.isPreviewable() && this.installCaptionEditor();
        }
        uninstall() {
            var t;
            let e = this.undos.pop();
            for (this.savePendingCaption(); e; ) e(), (e = this.undos.pop());
            null === (t = this.delegate) ||
                void 0 === t ||
                t.didUninstallAttachmentEditor(this);
        }
        savePendingCaption() {
            if (null != this.pendingCaption) {
                const r = this.pendingCaption;
                var t, e, i, n;
                if (((this.pendingCaption = null), r))
                    null === (t = this.delegate) ||
                        void 0 === t ||
                        null ===
                            (e =
                                t.attachmentEditorDidRequestUpdatingAttributesForAttachment) ||
                        void 0 === e ||
                        e.call(t, { caption: r }, this.attachment);
                else
                    null === (i = this.delegate) ||
                        void 0 === i ||
                        null ===
                            (n =
                                i.attachmentEditorDidRequestRemovingAttributeForAttachment) ||
                        void 0 === n ||
                        n.call(i, "caption", this.attachment);
            }
        }
        didClickToolbar(t) {
            return t.preventDefault(), t.stopPropagation();
        }
        didClickActionButton(t) {
            var e;
            if ("remove" === t.target.getAttribute("data-trix-action"))
                return null === (e = this.delegate) || void 0 === e
                    ? void 0
                    : e.attachmentEditorDidRequestRemovalOfAttachment(
                          this.attachment
                      );
        }
        didKeyDownCaption(t) {
            var e, i;
            if ("return" === Fi[t.keyCode])
                return (
                    t.preventDefault(),
                    this.savePendingCaption(),
                    null === (e = this.delegate) ||
                    void 0 === e ||
                    null ===
                        (i =
                            e.attachmentEditorDidRequestDeselectingAttachment) ||
                    void 0 === i
                        ? void 0
                        : i.call(e, this.attachment)
                );
        }
        didInputCaption(t) {
            this.pendingCaption = t.target.value.replace(/\s/g, " ").trim();
        }
        didChangeCaption(t) {
            return this.savePendingCaption();
        }
        didBlurCaption(t) {
            return this.savePendingCaption();
        }
    }
    class Ni extends z {
        constructor(t, i) {
            super(...arguments),
                (this.didFocus = this.didFocus.bind(this)),
                (this.didBlur = this.didBlur.bind(this)),
                (this.didClickAttachment = this.didClickAttachment.bind(this)),
                (this.element = t),
                (this.composition = i),
                (this.documentView = new ge(this.composition.document, {
                    element: this.element,
                })),
                f("focus", {
                    onElement: this.element,
                    withCallback: this.didFocus,
                }),
                f("blur", {
                    onElement: this.element,
                    withCallback: this.didBlur,
                }),
                f("click", {
                    onElement: this.element,
                    matchingSelector: "a[contenteditable=false]",
                    preventDefault: !0,
                }),
                f("mousedown", {
                    onElement: this.element,
                    matchingSelector: e,
                    withCallback: this.didClickAttachment,
                }),
                f("click", {
                    onElement: this.element,
                    matchingSelector: "a".concat(e),
                    preventDefault: !0,
                });
        }
        didFocus(t) {
            var e;
            const i = () => {
                var t, e;
                if (!this.focused)
                    return (
                        (this.focused = !0),
                        null === (t = this.delegate) ||
                        void 0 === t ||
                        null === (e = t.compositionControllerDidFocus) ||
                        void 0 === e
                            ? void 0
                            : e.call(t)
                    );
            };
            return (
                (null === (e = this.blurPromise) || void 0 === e
                    ? void 0
                    : e.then(i)) || i()
            );
        }
        didBlur(t) {
            this.blurPromise = new Promise((t) =>
                St(() => {
                    var e, i;
                    x(this.element) ||
                        ((this.focused = null),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            null === (i = e.compositionControllerDidBlur) ||
                            void 0 === i ||
                            i.call(e));
                    return (this.blurPromise = null), t();
                })
            );
        }
        didClickAttachment(t, e) {
            var i, n;
            const r = this.findAttachmentForElement(e),
                o = !!A(t.target, { matchingSelector: "figcaption" });
            return null === (i = this.delegate) ||
                void 0 === i ||
                null === (n = i.compositionControllerDidSelectAttachment) ||
                void 0 === n
                ? void 0
                : n.call(i, r, { editCaption: o });
        }
        getSerializableElement() {
            return this.isEditingAttachment()
                ? this.documentView.shadowElement
                : this.element;
        }
        render() {
            var t, e, i, n, r, o;
            (this.revision !== this.composition.revision &&
                (this.documentView.setDocument(this.composition.document),
                this.documentView.render(),
                (this.revision = this.composition.revision)),
            this.canSyncDocumentView() && !this.documentView.isSynced()) &&
                (null === (i = this.delegate) ||
                    void 0 === i ||
                    null ===
                        (n = i.compositionControllerWillSyncDocumentView) ||
                    void 0 === n ||
                    n.call(i),
                this.documentView.sync(),
                null === (r = this.delegate) ||
                    void 0 === r ||
                    null === (o = r.compositionControllerDidSyncDocumentView) ||
                    void 0 === o ||
                    o.call(r));
            return null === (t = this.delegate) ||
                void 0 === t ||
                null === (e = t.compositionControllerDidRender) ||
                void 0 === e
                ? void 0
                : e.call(t);
        }
        rerenderViewForObject(t) {
            return this.invalidateViewForObject(t), this.render();
        }
        invalidateViewForObject(t) {
            return this.documentView.invalidateViewForObject(t);
        }
        isViewCachingEnabled() {
            return this.documentView.isViewCachingEnabled();
        }
        enableViewCaching() {
            return this.documentView.enableViewCaching();
        }
        disableViewCaching() {
            return this.documentView.disableViewCaching();
        }
        refreshViewCache() {
            return this.documentView.garbageCollectCachedViews();
        }
        isEditingAttachment() {
            return !!this.attachmentEditor;
        }
        installAttachmentEditorForAttachment(t, e) {
            var i;
            if (
                (null === (i = this.attachmentEditor) || void 0 === i
                    ? void 0
                    : i.attachment) === t
            )
                return;
            const n = this.documentView.findElementForObject(t);
            if (!n) return;
            this.uninstallAttachmentEditor();
            const r =
                this.composition.document.getAttachmentPieceForAttachment(t);
            (this.attachmentEditor = new Pi(r, n, this.element, e)),
                (this.attachmentEditor.delegate = this);
        }
        uninstallAttachmentEditor() {
            var t;
            return null === (t = this.attachmentEditor) || void 0 === t
                ? void 0
                : t.uninstall();
        }
        didUninstallAttachmentEditor() {
            return (this.attachmentEditor = null), this.render();
        }
        attachmentEditorDidRequestUpdatingAttributesForAttachment(t, e) {
            var i, n;
            return (
                null === (i = this.delegate) ||
                    void 0 === i ||
                    null ===
                        (n = i.compositionControllerWillUpdateAttachment) ||
                    void 0 === n ||
                    n.call(i, e),
                this.composition.updateAttributesForAttachment(t, e)
            );
        }
        attachmentEditorDidRequestRemovingAttributeForAttachment(t, e) {
            var i, n;
            return (
                null === (i = this.delegate) ||
                    void 0 === i ||
                    null ===
                        (n = i.compositionControllerWillUpdateAttachment) ||
                    void 0 === n ||
                    n.call(i, e),
                this.composition.removeAttributeForAttachment(t, e)
            );
        }
        attachmentEditorDidRequestRemovalOfAttachment(t) {
            var e, i;
            return null === (e = this.delegate) ||
                void 0 === e ||
                null ===
                    (i =
                        e.compositionControllerDidRequestRemovalOfAttachment) ||
                void 0 === i
                ? void 0
                : i.call(e, t);
        }
        attachmentEditorDidRequestDeselectingAttachment(t) {
            var e, i;
            return null === (e = this.delegate) ||
                void 0 === e ||
                null ===
                    (i =
                        e.compositionControllerDidRequestDeselectingAttachment) ||
                void 0 === i
                ? void 0
                : i.call(e, t);
        }
        canSyncDocumentView() {
            return !this.isEditingAttachment();
        }
        findAttachmentForElement(t) {
            return this.composition.document.getAttachmentById(
                parseInt(t.dataset.trixId, 10)
            );
        }
    }
    class Oi extends z {}
    const Mi = "data-trix-mutable",
        ji = "[".concat(Mi, "]"),
        Wi = {
            attributes: !0,
            childList: !0,
            characterData: !0,
            characterDataOldValue: !0,
            subtree: !0,
        };
    class Ui extends z {
        constructor(t) {
            super(t),
                (this.didMutate = this.didMutate.bind(this)),
                (this.element = t),
                (this.observer = new window.MutationObserver(this.didMutate)),
                this.start();
        }
        start() {
            return this.reset(), this.observer.observe(this.element, Wi);
        }
        stop() {
            return this.observer.disconnect();
        }
        didMutate(t) {
            var e, i;
            if (
                (this.mutations.push(
                    ...Array.from(this.findSignificantMutations(t) || [])
                ),
                this.mutations.length)
            )
                return (
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        null === (i = e.elementDidMutate) ||
                        void 0 === i ||
                        i.call(e, this.getMutationSummary()),
                    this.reset()
                );
        }
        reset() {
            this.mutations = [];
        }
        findSignificantMutations(t) {
            return t.filter((t) => this.mutationIsSignificant(t));
        }
        mutationIsSignificant(t) {
            if (this.nodeIsMutable(t.target)) return !1;
            for (const e of Array.from(this.nodesModifiedByMutation(t)))
                if (this.nodeIsSignificant(e)) return !0;
            return !1;
        }
        nodeIsSignificant(t) {
            return t !== this.element && !this.nodeIsMutable(t) && !N(t);
        }
        nodeIsMutable(t) {
            return A(t, { matchingSelector: ji });
        }
        nodesModifiedByMutation(t) {
            const e = [];
            switch (t.type) {
                case "attributes":
                    t.attributeName !== Mi && e.push(t.target);
                    break;
                case "characterData":
                    e.push(t.target.parentNode), e.push(t.target);
                    break;
                case "childList":
                    e.push(...Array.from(t.addedNodes || [])),
                        e.push(...Array.from(t.removedNodes || []));
            }
            return e;
        }
        getMutationSummary() {
            return this.getTextMutationSummary();
        }
        getTextMutationSummary() {
            const { additions: t, deletions: e } =
                    this.getTextChangesFromCharacterData(),
                i = this.getTextChangesFromChildList();
            Array.from(i.additions).forEach((e) => {
                Array.from(t).includes(e) || t.push(e);
            }),
                e.push(...Array.from(i.deletions || []));
            const n = {},
                r = t.join("");
            r && (n.textAdded = r);
            const o = e.join("");
            return o && (n.textDeleted = o), n;
        }
        getMutationsByType(t) {
            return Array.from(this.mutations).filter((e) => e.type === t);
        }
        getTextChangesFromChildList() {
            let t, e;
            const i = [],
                n = [];
            Array.from(this.getMutationsByType("childList")).forEach((t) => {
                i.push(...Array.from(t.addedNodes || [])),
                    n.push(...Array.from(t.removedNodes || []));
            });
            0 === i.length && 1 === n.length && B(n[0])
                ? ((t = []), (e = ["\n"]))
                : ((t = qi(i)), (e = qi(n)));
            return {
                additions: t.filter((t, i) => t !== e[i]).map(Wt),
                deletions: e.filter((e, i) => e !== t[i]).map(Wt),
            };
        }
        getTextChangesFromCharacterData() {
            let t, e;
            const i = this.getMutationsByType("characterData");
            if (i.length) {
                const n = i[0],
                    r = i[i.length - 1],
                    o = (function (t, e) {
                        let i, n;
                        return (
                            (t = X.box(t)),
                            (e = X.box(e)).length < t.length
                                ? ([n, i] = Vt(t, e))
                                : ([i, n] = Vt(e, t)),
                            { added: i, removed: n }
                        );
                    })(Wt(n.oldValue), Wt(r.target.data));
                (t = o.added), (e = o.removed);
            }
            return { additions: t ? [t] : [], deletions: e ? [e] : [] };
        }
    }
    const qi = function () {
        let t =
            arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
        const e = [];
        for (const i of Array.from(t))
            switch (i.nodeType) {
                case Node.TEXT_NODE:
                    e.push(i.data);
                    break;
                case Node.ELEMENT_NODE:
                    "br" === E(i)
                        ? e.push("\n")
                        : e.push(...Array.from(qi(i.childNodes) || []));
            }
        return e;
    };
    class Vi extends te {
        constructor(t) {
            super(...arguments), (this.file = t);
        }
        perform(t) {
            const e = new FileReader();
            return (
                (e.onerror = () => t(!1)),
                (e.onload = () => {
                    e.onerror = null;
                    try {
                        e.abort();
                    } catch (t) {}
                    return t(!0, this.file);
                }),
                e.readAsArrayBuffer(this.file)
            );
        }
    }
    class zi {
        constructor(t) {
            this.element = t;
        }
        shouldIgnore(t) {
            return (
                !!a.samsungAndroid &&
                ((this.previousEvent = this.event),
                (this.event = t),
                this.checkSamsungKeyboardBuggyModeStart(),
                this.checkSamsungKeyboardBuggyModeEnd(),
                this.buggyMode)
            );
        }
        checkSamsungKeyboardBuggyModeStart() {
            this.insertingLongTextAfterUnidentifiedChar() &&
                _i(this.element.innerText, this.event.data) &&
                ((this.buggyMode = !0), this.event.preventDefault());
        }
        checkSamsungKeyboardBuggyModeEnd() {
            this.buggyMode &&
                "insertText" !== this.event.inputType &&
                (this.buggyMode = !1);
        }
        insertingLongTextAfterUnidentifiedChar() {
            var t;
            return (
                this.isBeforeInputInsertText() &&
                this.previousEventWasUnidentifiedKeydown() &&
                (null === (t = this.event.data) || void 0 === t
                    ? void 0
                    : t.length) > 50
            );
        }
        isBeforeInputInsertText() {
            return (
                "beforeinput" === this.event.type &&
                "insertText" === this.event.inputType
            );
        }
        previousEventWasUnidentifiedKeydown() {
            var t, e;
            return (
                "keydown" ===
                    (null === (t = this.previousEvent) || void 0 === t
                        ? void 0
                        : t.type) &&
                "Unidentified" ===
                    (null === (e = this.previousEvent) || void 0 === e
                        ? void 0
                        : e.key)
            );
        }
    }
    const _i = (t, e) => Ji(t) === Ji(e),
        Hi = new RegExp(
            "(".concat("￼", "|").concat(h, "|").concat(d, "|\\s)+"),
            "g"
        ),
        Ji = (t) => t.replace(Hi, " ").trim();
    class Ki extends z {
        constructor(t) {
            super(...arguments),
                (this.element = t),
                (this.mutationObserver = new Ui(this.element)),
                (this.mutationObserver.delegate = this),
                (this.flakyKeyboardDetector = new zi(this.element));
            for (const t in this.constructor.events)
                f(t, {
                    onElement: this.element,
                    withCallback: this.handlerFor(t),
                });
        }
        elementDidMutate(t) {}
        editorWillSyncDocumentView() {
            return this.mutationObserver.stop();
        }
        editorDidSyncDocumentView() {
            return this.mutationObserver.start();
        }
        requestRender() {
            var t, e;
            return null === (t = this.delegate) ||
                void 0 === t ||
                null === (e = t.inputControllerDidRequestRender) ||
                void 0 === e
                ? void 0
                : e.call(t);
        }
        requestReparse() {
            var t, e;
            return (
                null === (t = this.delegate) ||
                    void 0 === t ||
                    null === (e = t.inputControllerDidRequestReparse) ||
                    void 0 === e ||
                    e.call(t),
                this.requestRender()
            );
        }
        attachFiles(t) {
            const e = Array.from(t).map((t) => new Vi(t));
            return Promise.all(e).then((t) => {
                this.handleInput(function () {
                    var e, i;
                    return (
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillAttachFiles(),
                        null === (i = this.responder) ||
                            void 0 === i ||
                            i.insertFiles(t),
                        this.requestRender()
                    );
                });
            });
        }
        handlerFor(t) {
            return (e) => {
                e.defaultPrevented ||
                    this.handleInput(() => {
                        if (!x(this.element)) {
                            if (this.flakyKeyboardDetector.shouldIgnore(e))
                                return;
                            (this.eventName = t),
                                this.constructor.events[t].call(this, e);
                        }
                    });
            };
        }
        handleInput(t) {
            try {
                var e;
                null === (e = this.delegate) ||
                    void 0 === e ||
                    e.inputControllerWillHandleInput(),
                    t.call(this);
            } finally {
                var i;
                null === (i = this.delegate) ||
                    void 0 === i ||
                    i.inputControllerDidHandleInput();
            }
        }
        createLinkHTML(t, e) {
            const i = document.createElement("a");
            return (i.href = t), (i.textContent = e || t), i.outerHTML;
        }
    }
    var Gi;
    Ae(Ki, "events", {});
    const { browser: $i, keyNames: Xi } = V;
    let Yi = 0;
    class Qi extends Ki {
        constructor() {
            super(...arguments), this.resetInputSummary();
        }
        setInputSummary() {
            let t =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : {};
            this.inputSummary.eventName = this.eventName;
            for (const e in t) {
                const i = t[e];
                this.inputSummary[e] = i;
            }
            return this.inputSummary;
        }
        resetInputSummary() {
            this.inputSummary = {};
        }
        reset() {
            return this.resetInputSummary(), It.reset();
        }
        elementDidMutate(t) {
            var e, i;
            return this.isComposing()
                ? null === (e = this.delegate) ||
                  void 0 === e ||
                  null === (i = e.inputControllerDidAllowUnhandledInput) ||
                  void 0 === i
                    ? void 0
                    : i.call(e)
                : this.handleInput(function () {
                      return (
                          this.mutationIsSignificant(t) &&
                              (this.mutationIsExpected(t)
                                  ? this.requestRender()
                                  : this.requestReparse()),
                          this.reset()
                      );
                  });
        }
        mutationIsExpected(t) {
            let { textAdded: e, textDeleted: i } = t;
            if (this.inputSummary.preferDocument) return !0;
            const n =
                    null != e
                        ? e === this.inputSummary.textAdded
                        : !this.inputSummary.textAdded,
                r =
                    null != i
                        ? this.inputSummary.didDelete
                        : !this.inputSummary.didDelete,
                o = ["\n", " \n"].includes(e) && !n,
                s = "\n" === i && !r;
            if ((o && !s) || (s && !o)) {
                const t = this.getSelectedRange();
                if (t) {
                    var a;
                    const i = o
                        ? e.replace(/\n$/, "").length || -1
                        : (null == e ? void 0 : e.length) || 1;
                    if (
                        null !== (a = this.responder) &&
                        void 0 !== a &&
                        a.positionIsBlockBreak(t[1] + i)
                    )
                        return !0;
                }
            }
            return n && r;
        }
        mutationIsSignificant(t) {
            var e;
            const i = Object.keys(t).length > 0,
                n =
                    "" ===
                    (null === (e = this.compositionInput) || void 0 === e
                        ? void 0
                        : e.getEndData());
            return i || !n;
        }
        getCompositionInput() {
            if (this.isComposing()) return this.compositionInput;
            this.compositionInput = new rn(this);
        }
        isComposing() {
            return this.compositionInput && !this.compositionInput.isEnded();
        }
        deleteInDirection(t, e) {
            var i;
            return !1 !==
                (null === (i = this.responder) || void 0 === i
                    ? void 0
                    : i.deleteInDirection(t))
                ? this.setInputSummary({ didDelete: !0 })
                : e
                ? (e.preventDefault(), this.requestRender())
                : void 0;
        }
        serializeSelectionToDataTransfer(t) {
            var e;
            if (
                !(function (t) {
                    if (null == t || !t.setData) return !1;
                    for (const e in yt) {
                        const i = yt[e];
                        try {
                            if ((t.setData(e, i), !t.getData(e) === i))
                                return !1;
                        } catch (t) {
                            return !1;
                        }
                    }
                    return !0;
                })(t)
            )
                return;
            const i =
                null === (e = this.responder) || void 0 === e
                    ? void 0
                    : e.getSelectedDocument().toSerializableDocument();
            return (
                t.setData("application/x-trix-document", JSON.stringify(i)),
                t.setData("text/html", ge.render(i).innerHTML),
                t.setData("text/plain", i.toString().replace(/\n$/, "")),
                !0
            );
        }
        canAcceptDataTransfer(t) {
            const e = {};
            return (
                Array.from((null == t ? void 0 : t.types) || []).forEach(
                    (t) => {
                        e[t] = !0;
                    }
                ),
                e.Files ||
                    e["application/x-trix-document"] ||
                    e["text/html"] ||
                    e["text/plain"]
            );
        }
        getPastedHTMLUsingHiddenElement(t) {
            const e = this.getSelectedRange(),
                i = {
                    position: "absolute",
                    left: "".concat(window.pageXOffset, "px"),
                    top: "".concat(window.pageYOffset, "px"),
                    opacity: 0,
                },
                n = k({ style: i, tagName: "div", editable: !0 });
            return (
                document.body.appendChild(n),
                n.focus(),
                requestAnimationFrame(() => {
                    const i = n.innerHTML;
                    return R(n), this.setSelectedRange(e), t(i);
                })
            );
        }
    }
    Ae(Qi, "events", {
        keydown(t) {
            this.isComposing() || this.resetInputSummary(),
                (this.inputSummary.didInput = !0);
            const e = Xi[t.keyCode];
            if (e) {
                var i;
                let n = this.keys;
                ["ctrl", "alt", "shift", "meta"].forEach((e) => {
                    var i;
                    t["".concat(e, "Key")] &&
                        ("ctrl" === e && (e = "control"),
                        (n = null === (i = n) || void 0 === i ? void 0 : i[e]));
                }),
                    null !=
                        (null === (i = n) || void 0 === i ? void 0 : i[e]) &&
                        (this.setInputSummary({ keyName: e }),
                        It.reset(),
                        n[e].call(this, t));
            }
            if (Rt(t)) {
                const e = String.fromCharCode(t.keyCode).toLowerCase();
                if (e) {
                    var n;
                    const i = ["alt", "shift"]
                        .map((e) => {
                            if (t["".concat(e, "Key")]) return e;
                        })
                        .filter((t) => t);
                    i.push(e),
                        null !== (n = this.delegate) &&
                            void 0 !== n &&
                            n.inputControllerDidReceiveKeyboardCommand(i) &&
                            t.preventDefault();
                }
            }
        },
        keypress(t) {
            if (null != this.inputSummary.eventName) return;
            if (t.metaKey) return;
            if (t.ctrlKey && !t.altKey) return;
            const e = en(t);
            var i, n;
            return e
                ? (null === (i = this.delegate) ||
                      void 0 === i ||
                      i.inputControllerWillPerformTyping(),
                  null === (n = this.responder) ||
                      void 0 === n ||
                      n.insertString(e),
                  this.setInputSummary({
                      textAdded: e,
                      didDelete: this.selectionIsExpanded(),
                  }))
                : void 0;
        },
        textInput(t) {
            const { data: e } = t,
                { textAdded: i } = this.inputSummary;
            if (i && i !== e && i.toUpperCase() === e) {
                var n;
                const t = this.getSelectedRange();
                return (
                    this.setSelectedRange([t[0], t[1] + i.length]),
                    null === (n = this.responder) ||
                        void 0 === n ||
                        n.insertString(e),
                    this.setInputSummary({ textAdded: e }),
                    this.setSelectedRange(t)
                );
            }
        },
        dragenter(t) {
            t.preventDefault();
        },
        dragstart(t) {
            var e, i;
            return (
                this.serializeSelectionToDataTransfer(t.dataTransfer),
                (this.draggedRange = this.getSelectedRange()),
                null === (e = this.delegate) ||
                void 0 === e ||
                null === (i = e.inputControllerDidStartDrag) ||
                void 0 === i
                    ? void 0
                    : i.call(e)
            );
        },
        dragover(t) {
            if (
                this.draggedRange ||
                this.canAcceptDataTransfer(t.dataTransfer)
            ) {
                t.preventDefault();
                const n = { x: t.clientX, y: t.clientY };
                var e, i;
                if (!kt(n, this.draggingPoint))
                    return (
                        (this.draggingPoint = n),
                        null === (e = this.delegate) ||
                        void 0 === e ||
                        null ===
                            (i = e.inputControllerDidReceiveDragOverPoint) ||
                        void 0 === i
                            ? void 0
                            : i.call(e, this.draggingPoint)
                    );
            }
        },
        dragend(t) {
            var e, i;
            null === (e = this.delegate) ||
                void 0 === e ||
                null === (i = e.inputControllerDidCancelDrag) ||
                void 0 === i ||
                i.call(e),
                (this.draggedRange = null),
                (this.draggingPoint = null);
        },
        drop(t) {
            var e, i;
            t.preventDefault();
            const n =
                    null === (e = t.dataTransfer) || void 0 === e
                        ? void 0
                        : e.files,
                r = t.dataTransfer.getData("application/x-trix-document"),
                o = { x: t.clientX, y: t.clientY };
            if (
                (null === (i = this.responder) ||
                    void 0 === i ||
                    i.setLocationRangeFromPointRange(o),
                null != n && n.length)
            )
                this.attachFiles(n);
            else if (this.draggedRange) {
                var s, a;
                null === (s = this.delegate) ||
                    void 0 === s ||
                    s.inputControllerWillMoveText(),
                    null === (a = this.responder) ||
                        void 0 === a ||
                        a.moveTextFromRange(this.draggedRange),
                    (this.draggedRange = null),
                    this.requestRender();
            } else if (r) {
                var l;
                const t = qe.fromJSONString(r);
                null === (l = this.responder) ||
                    void 0 === l ||
                    l.insertDocument(t),
                    this.requestRender();
            }
            (this.draggedRange = null), (this.draggingPoint = null);
        },
        cut(t) {
            var e, i;
            if (
                null !== (e = this.responder) &&
                void 0 !== e &&
                e.selectionIsExpanded() &&
                (this.serializeSelectionToDataTransfer(t.clipboardData) &&
                    t.preventDefault(),
                null === (i = this.delegate) ||
                    void 0 === i ||
                    i.inputControllerWillCutText(),
                this.deleteInDirection("backward"),
                t.defaultPrevented)
            )
                return this.requestRender();
        },
        copy(t) {
            var e;
            null !== (e = this.responder) &&
                void 0 !== e &&
                e.selectionIsExpanded() &&
                this.serializeSelectionToDataTransfer(t.clipboardData) &&
                t.preventDefault();
        },
        paste(t) {
            const e = t.clipboardData || t.testClipboardData,
                i = { clipboard: e };
            if (!e || nn(t))
                return void this.getPastedHTMLUsingHiddenElement((t) => {
                    var e, n, r;
                    return (
                        (i.type = "text/html"),
                        (i.html = t),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillPaste(i),
                        null === (n = this.responder) ||
                            void 0 === n ||
                            n.insertHTML(i.html),
                        this.requestRender(),
                        null === (r = this.delegate) || void 0 === r
                            ? void 0
                            : r.inputControllerDidPaste(i)
                    );
                });
            const n = e.getData("URL"),
                r = e.getData("text/html"),
                o = e.getData("public.url-name");
            if (n) {
                var s, a, l;
                let t;
                (i.type = "text/html"),
                    (t = o ? qt(o).trim() : n),
                    (i.html = this.createLinkHTML(n, t)),
                    null === (s = this.delegate) ||
                        void 0 === s ||
                        s.inputControllerWillPaste(i),
                    this.setInputSummary({
                        textAdded: t,
                        didDelete: this.selectionIsExpanded(),
                    }),
                    null === (a = this.responder) ||
                        void 0 === a ||
                        a.insertHTML(i.html),
                    this.requestRender(),
                    null === (l = this.delegate) ||
                        void 0 === l ||
                        l.inputControllerDidPaste(i);
            } else if (Ct(e)) {
                var c, u, h;
                (i.type = "text/plain"),
                    (i.string = e.getData("text/plain")),
                    null === (c = this.delegate) ||
                        void 0 === c ||
                        c.inputControllerWillPaste(i),
                    this.setInputSummary({
                        textAdded: i.string,
                        didDelete: this.selectionIsExpanded(),
                    }),
                    null === (u = this.responder) ||
                        void 0 === u ||
                        u.insertString(i.string),
                    this.requestRender(),
                    null === (h = this.delegate) ||
                        void 0 === h ||
                        h.inputControllerDidPaste(i);
            } else if (r) {
                var d, g, m;
                (i.type = "text/html"),
                    (i.html = r),
                    null === (d = this.delegate) ||
                        void 0 === d ||
                        d.inputControllerWillPaste(i),
                    null === (g = this.responder) ||
                        void 0 === g ||
                        g.insertHTML(i.html),
                    this.requestRender(),
                    null === (m = this.delegate) ||
                        void 0 === m ||
                        m.inputControllerDidPaste(i);
            } else if (Array.from(e.types).includes("Files")) {
                var p, f;
                const t =
                    null === (p = e.items) ||
                    void 0 === p ||
                    null === (p = p[0]) ||
                    void 0 === p ||
                    null === (f = p.getAsFile) ||
                    void 0 === f
                        ? void 0
                        : f.call(p);
                if (t) {
                    var b, v, A;
                    const e = Zi(t);
                    !t.name &&
                        e &&
                        (t.name = "pasted-file-".concat(++Yi, ".").concat(e)),
                        (i.type = "File"),
                        (i.file = t),
                        null === (b = this.delegate) ||
                            void 0 === b ||
                            b.inputControllerWillAttachFiles(),
                        null === (v = this.responder) ||
                            void 0 === v ||
                            v.insertFile(i.file),
                        this.requestRender(),
                        null === (A = this.delegate) ||
                            void 0 === A ||
                            A.inputControllerDidPaste(i);
                }
            }
            t.preventDefault();
        },
        compositionstart(t) {
            return this.getCompositionInput().start(t.data);
        },
        compositionupdate(t) {
            return this.getCompositionInput().update(t.data);
        },
        compositionend(t) {
            return this.getCompositionInput().end(t.data);
        },
        beforeinput(t) {
            this.inputSummary.didInput = !0;
        },
        input(t) {
            return (this.inputSummary.didInput = !0), t.stopPropagation();
        },
    }),
        Ae(Qi, "keys", {
            backspace(t) {
                var e;
                return (
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillPerformTyping(),
                    this.deleteInDirection("backward", t)
                );
            },
            delete(t) {
                var e;
                return (
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillPerformTyping(),
                    this.deleteInDirection("forward", t)
                );
            },
            return(t) {
                var e, i;
                return (
                    this.setInputSummary({ preferDocument: !0 }),
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillPerformTyping(),
                    null === (i = this.responder) || void 0 === i
                        ? void 0
                        : i.insertLineBreak()
                );
            },
            tab(t) {
                var e, i;
                null !== (e = this.responder) &&
                    void 0 !== e &&
                    e.canIncreaseNestingLevel() &&
                    (null === (i = this.responder) ||
                        void 0 === i ||
                        i.increaseNestingLevel(),
                    this.requestRender(),
                    t.preventDefault());
            },
            left(t) {
                var e;
                if (this.selectionIsInCursorTarget())
                    return (
                        t.preventDefault(),
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.moveCursorInDirection("backward")
                    );
            },
            right(t) {
                var e;
                if (this.selectionIsInCursorTarget())
                    return (
                        t.preventDefault(),
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.moveCursorInDirection("forward")
                    );
            },
            control: {
                d(t) {
                    var e;
                    return (
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillPerformTyping(),
                        this.deleteInDirection("forward", t)
                    );
                },
                h(t) {
                    var e;
                    return (
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillPerformTyping(),
                        this.deleteInDirection("backward", t)
                    );
                },
                o(t) {
                    var e, i;
                    return (
                        t.preventDefault(),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillPerformTyping(),
                        null === (i = this.responder) ||
                            void 0 === i ||
                            i.insertString("\n", { updatePosition: !1 }),
                        this.requestRender()
                    );
                },
            },
            shift: {
                return(t) {
                    var e, i;
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillPerformTyping(),
                        null === (i = this.responder) ||
                            void 0 === i ||
                            i.insertString("\n"),
                        this.requestRender(),
                        t.preventDefault();
                },
                tab(t) {
                    var e, i;
                    null !== (e = this.responder) &&
                        void 0 !== e &&
                        e.canDecreaseNestingLevel() &&
                        (null === (i = this.responder) ||
                            void 0 === i ||
                            i.decreaseNestingLevel(),
                        this.requestRender(),
                        t.preventDefault());
                },
                left(t) {
                    if (this.selectionIsInCursorTarget())
                        return (
                            t.preventDefault(),
                            this.expandSelectionInDirection("backward")
                        );
                },
                right(t) {
                    if (this.selectionIsInCursorTarget())
                        return (
                            t.preventDefault(),
                            this.expandSelectionInDirection("forward")
                        );
                },
            },
            alt: {
                backspace(t) {
                    var e;
                    return (
                        this.setInputSummary({ preferDocument: !1 }),
                        null === (e = this.delegate) || void 0 === e
                            ? void 0
                            : e.inputControllerWillPerformTyping()
                    );
                },
            },
            meta: {
                backspace(t) {
                    var e;
                    return (
                        this.setInputSummary({ preferDocument: !1 }),
                        null === (e = this.delegate) || void 0 === e
                            ? void 0
                            : e.inputControllerWillPerformTyping()
                    );
                },
            },
        }),
        Qi.proxyMethod("responder?.getSelectedRange"),
        Qi.proxyMethod("responder?.setSelectedRange"),
        Qi.proxyMethod("responder?.expandSelectionInDirection"),
        Qi.proxyMethod("responder?.selectionIsInCursorTarget"),
        Qi.proxyMethod("responder?.selectionIsExpanded");
    const Zi = (t) => {
            var e;
            return null === (e = t.type) ||
                void 0 === e ||
                null === (e = e.match(/\/(\w+)$/)) ||
                void 0 === e
                ? void 0
                : e[1];
        },
        tn = !(
            null === (Gi = " ".codePointAt) ||
            void 0 === Gi ||
            !Gi.call(" ", 0)
        ),
        en = function (t) {
            if (t.key && tn && t.key.codePointAt(0) === t.keyCode) return t.key;
            {
                let e;
                if (
                    (null === t.which
                        ? (e = t.keyCode)
                        : 0 !== t.which && 0 !== t.charCode && (e = t.charCode),
                    null != e && "escape" !== Xi[e])
                )
                    return X.fromCodepoints([e]).toString();
            }
        },
        nn = function (t) {
            const e = t.clipboardData;
            if (e) {
                if (e.types.includes("text/html")) {
                    for (const t of e.types) {
                        const i = /^CorePasteboardFlavorType/.test(t),
                            n = /^dyn\./.test(t) && e.getData(t);
                        if (i || n) return !0;
                    }
                    return !1;
                }
                {
                    const t = e.types.includes("com.apple.webarchive"),
                        i = e.types.includes("com.apple.flat-rtfd");
                    return t || i;
                }
            }
        };
    class rn extends z {
        constructor(t) {
            super(...arguments),
                (this.inputController = t),
                (this.responder = this.inputController.responder),
                (this.delegate = this.inputController.delegate),
                (this.inputSummary = this.inputController.inputSummary),
                (this.data = {});
        }
        start(t) {
            if (((this.data.start = t), this.isSignificant())) {
                var e, i;
                if (
                    "keypress" === this.inputSummary.eventName &&
                    this.inputSummary.textAdded
                )
                    null === (i = this.responder) ||
                        void 0 === i ||
                        i.deleteInDirection("left");
                this.selectionIsExpanded() ||
                    (this.insertPlaceholder(), this.requestRender()),
                    (this.range =
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.getSelectedRange());
            }
        }
        update(t) {
            if (((this.data.update = t), this.isSignificant())) {
                const t = this.selectPlaceholder();
                t && (this.forgetPlaceholder(), (this.range = t));
            }
        }
        end(t) {
            return (
                (this.data.end = t),
                this.isSignificant()
                    ? (this.forgetPlaceholder(),
                      this.canApplyToDocument()
                          ? (this.setInputSummary({
                                preferDocument: !0,
                                didInput: !1,
                            }),
                            null === (e = this.delegate) ||
                                void 0 === e ||
                                e.inputControllerWillPerformTyping(),
                            null === (i = this.responder) ||
                                void 0 === i ||
                                i.setSelectedRange(this.range),
                            null === (n = this.responder) ||
                                void 0 === n ||
                                n.insertString(this.data.end),
                            null === (r = this.responder) || void 0 === r
                                ? void 0
                                : r.setSelectedRange(
                                      this.range[0] + this.data.end.length
                                  ))
                          : null != this.data.start || null != this.data.update
                          ? (this.requestReparse(),
                            this.inputController.reset())
                          : void 0)
                    : this.inputController.reset()
            );
            var e, i, n, r;
        }
        getEndData() {
            return this.data.end;
        }
        isEnded() {
            return null != this.getEndData();
        }
        isSignificant() {
            return !$i.composesExistingText || this.inputSummary.didInput;
        }
        canApplyToDocument() {
            var t, e;
            return (
                0 ===
                    (null === (t = this.data.start) || void 0 === t
                        ? void 0
                        : t.length) &&
                (null === (e = this.data.end) || void 0 === e
                    ? void 0
                    : e.length) > 0 &&
                this.range
            );
        }
    }
    rn.proxyMethod("inputController.setInputSummary"),
        rn.proxyMethod("inputController.requestRender"),
        rn.proxyMethod("inputController.requestReparse"),
        rn.proxyMethod("responder?.selectionIsExpanded"),
        rn.proxyMethod("responder?.insertPlaceholder"),
        rn.proxyMethod("responder?.selectPlaceholder"),
        rn.proxyMethod("responder?.forgetPlaceholder");
    class on extends Ki {
        constructor() {
            super(...arguments), (this.render = this.render.bind(this));
        }
        elementDidMutate() {
            return this.scheduledRender
                ? this.composing
                    ? null === (t = this.delegate) ||
                      void 0 === t ||
                      null === (e = t.inputControllerDidAllowUnhandledInput) ||
                      void 0 === e
                        ? void 0
                        : e.call(t)
                    : void 0
                : this.reparse();
            var t, e;
        }
        scheduleRender() {
            return this.scheduledRender
                ? this.scheduledRender
                : (this.scheduledRender = requestAnimationFrame(this.render));
        }
        render() {
            var t, e;
            (cancelAnimationFrame(this.scheduledRender),
            (this.scheduledRender = null),
            this.composing) ||
                null === (e = this.delegate) ||
                void 0 === e ||
                e.render();
            null === (t = this.afterRender) || void 0 === t || t.call(this),
                (this.afterRender = null);
        }
        reparse() {
            var t;
            return null === (t = this.delegate) || void 0 === t
                ? void 0
                : t.reparse();
        }
        insertString() {
            var t;
            let e =
                    arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : "",
                i = arguments.length > 1 ? arguments[1] : void 0;
            return (
                null === (t = this.delegate) ||
                    void 0 === t ||
                    t.inputControllerWillPerformTyping(),
                this.withTargetDOMRange(function () {
                    var t;
                    return null === (t = this.responder) || void 0 === t
                        ? void 0
                        : t.insertString(e, i);
                })
            );
        }
        toggleAttributeIfSupported(t) {
            var e;
            if (dt().includes(t))
                return (
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillPerformFormatting(t),
                    this.withTargetDOMRange(function () {
                        var e;
                        return null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.toggleCurrentAttribute(t);
                    })
                );
        }
        activateAttributeIfSupported(t, e) {
            var i;
            if (dt().includes(t))
                return (
                    null === (i = this.delegate) ||
                        void 0 === i ||
                        i.inputControllerWillPerformFormatting(t),
                    this.withTargetDOMRange(function () {
                        var i;
                        return null === (i = this.responder) || void 0 === i
                            ? void 0
                            : i.setCurrentAttribute(t, e);
                    })
                );
        }
        deleteInDirection(t) {
            let { recordUndoEntry: e } =
                arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : { recordUndoEntry: !0 };
            var i;
            e &&
                (null === (i = this.delegate) ||
                    void 0 === i ||
                    i.inputControllerWillPerformTyping());
            const n = () => {
                    var e;
                    return null === (e = this.responder) || void 0 === e
                        ? void 0
                        : e.deleteInDirection(t);
                },
                r = this.getTargetDOMRange({ minLength: 2 });
            return r ? this.withTargetDOMRange(r, n) : n();
        }
        withTargetDOMRange(t, e) {
            var i;
            return (
                "function" == typeof t &&
                    ((e = t), (t = this.getTargetDOMRange())),
                t
                    ? null === (i = this.responder) || void 0 === i
                        ? void 0
                        : i.withTargetDOMRange(t, e.bind(this))
                    : (It.reset(), e.call(this))
            );
        }
        getTargetDOMRange() {
            var t, e;
            let { minLength: i } =
                arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : { minLength: 0 };
            const n =
                null === (t = (e = this.event).getTargetRanges) || void 0 === t
                    ? void 0
                    : t.call(e);
            if (n && n.length) {
                const t = sn(n[0]);
                if (0 === i || t.toString().length >= i) return t;
            }
        }
        withEvent(t, e) {
            let i;
            this.event = t;
            try {
                i = e.call(this);
            } finally {
                this.event = null;
            }
            return i;
        }
    }
    Ae(on, "events", {
        keydown(t) {
            if (Rt(t)) {
                var e;
                const i = un(t);
                null !== (e = this.delegate) &&
                    void 0 !== e &&
                    e.inputControllerDidReceiveKeyboardCommand(i) &&
                    t.preventDefault();
            } else {
                let e = t.key;
                t.altKey && (e += "+Alt"), t.shiftKey && (e += "+Shift");
                const i = this.constructor.keys[e];
                if (i) return this.withEvent(t, i);
            }
        },
        paste(t) {
            var e;
            let i;
            const n =
                null === (e = t.clipboardData) || void 0 === e
                    ? void 0
                    : e.getData("URL");
            return ln(t)
                ? (t.preventDefault(), this.attachFiles(t.clipboardData.files))
                : cn(t)
                ? (t.preventDefault(),
                  (i = {
                      type: "text/plain",
                      string: t.clipboardData.getData("text/plain"),
                  }),
                  null === (r = this.delegate) ||
                      void 0 === r ||
                      r.inputControllerWillPaste(i),
                  null === (o = this.responder) ||
                      void 0 === o ||
                      o.insertString(i.string),
                  this.render(),
                  null === (s = this.delegate) || void 0 === s
                      ? void 0
                      : s.inputControllerDidPaste(i))
                : n
                ? (t.preventDefault(),
                  (i = { type: "text/html", html: this.createLinkHTML(n) }),
                  null === (a = this.delegate) ||
                      void 0 === a ||
                      a.inputControllerWillPaste(i),
                  null === (l = this.responder) ||
                      void 0 === l ||
                      l.insertHTML(i.html),
                  this.render(),
                  null === (c = this.delegate) || void 0 === c
                      ? void 0
                      : c.inputControllerDidPaste(i))
                : void 0;
            var r, o, s, a, l, c;
        },
        beforeinput(t) {
            const e = this.constructor.inputTypes[t.inputType];
            e && (this.withEvent(t, e), this.scheduleRender());
        },
        input(t) {
            It.reset();
        },
        dragstart(t) {
            var e, i;
            null !== (e = this.responder) &&
                void 0 !== e &&
                e.selectionContainsAttachments() &&
                (t.dataTransfer.setData("application/x-trix-dragging", !0),
                (this.dragging = {
                    range:
                        null === (i = this.responder) || void 0 === i
                            ? void 0
                            : i.getSelectedRange(),
                    point: hn(t),
                }));
        },
        dragenter(t) {
            an(t) && t.preventDefault();
        },
        dragover(t) {
            if (this.dragging) {
                t.preventDefault();
                const i = hn(t);
                var e;
                if (!kt(i, this.dragging.point))
                    return (
                        (this.dragging.point = i),
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.setLocationRangeFromPointRange(i)
                    );
            } else an(t) && t.preventDefault();
        },
        drop(t) {
            var e, i;
            if (this.dragging)
                return (
                    t.preventDefault(),
                    null === (e = this.delegate) ||
                        void 0 === e ||
                        e.inputControllerWillMoveText(),
                    null === (i = this.responder) ||
                        void 0 === i ||
                        i.moveTextFromRange(this.dragging.range),
                    (this.dragging = null),
                    this.scheduleRender()
                );
            if (an(t)) {
                var n;
                t.preventDefault();
                const e = hn(t);
                return (
                    null === (n = this.responder) ||
                        void 0 === n ||
                        n.setLocationRangeFromPointRange(e),
                    this.attachFiles(t.dataTransfer.files)
                );
            }
        },
        dragend() {
            var t;
            this.dragging &&
                (null === (t = this.responder) ||
                    void 0 === t ||
                    t.setSelectedRange(this.dragging.range),
                (this.dragging = null));
        },
        compositionend(t) {
            this.composing &&
                ((this.composing = !1),
                a.recentAndroid || this.scheduleRender());
        },
    }),
        Ae(on, "keys", {
            ArrowLeft() {
                var t, e;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.shouldManageMovingCursorInDirection("backward")
                )
                    return (
                        this.event.preventDefault(),
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.moveCursorInDirection("backward")
                    );
            },
            ArrowRight() {
                var t, e;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.shouldManageMovingCursorInDirection("forward")
                )
                    return (
                        this.event.preventDefault(),
                        null === (e = this.responder) || void 0 === e
                            ? void 0
                            : e.moveCursorInDirection("forward")
                    );
            },
            Backspace() {
                var t, e, i;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.shouldManageDeletingInDirection("backward")
                )
                    return (
                        this.event.preventDefault(),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillPerformTyping(),
                        null === (i = this.responder) ||
                            void 0 === i ||
                            i.deleteInDirection("backward"),
                        this.render()
                    );
            },
            Tab() {
                var t, e;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.canIncreaseNestingLevel()
                )
                    return (
                        this.event.preventDefault(),
                        null === (e = this.responder) ||
                            void 0 === e ||
                            e.increaseNestingLevel(),
                        this.render()
                    );
            },
            "Tab+Shift"() {
                var t, e;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.canDecreaseNestingLevel()
                )
                    return (
                        this.event.preventDefault(),
                        null === (e = this.responder) ||
                            void 0 === e ||
                            e.decreaseNestingLevel(),
                        this.render()
                    );
            },
        }),
        Ae(on, "inputTypes", {
            deleteByComposition() {
                return this.deleteInDirection("backward", {
                    recordUndoEntry: !1,
                });
            },
            deleteByCut() {
                return this.deleteInDirection("backward");
            },
            deleteByDrag() {
                return (
                    this.event.preventDefault(),
                    this.withTargetDOMRange(function () {
                        var t;
                        this.deleteByDragRange =
                            null === (t = this.responder) || void 0 === t
                                ? void 0
                                : t.getSelectedRange();
                    })
                );
            },
            deleteCompositionText() {
                return this.deleteInDirection("backward", {
                    recordUndoEntry: !1,
                });
            },
            deleteContent() {
                return this.deleteInDirection("backward");
            },
            deleteContentBackward() {
                return this.deleteInDirection("backward");
            },
            deleteContentForward() {
                return this.deleteInDirection("forward");
            },
            deleteEntireSoftLine() {
                return this.deleteInDirection("forward");
            },
            deleteHardLineBackward() {
                return this.deleteInDirection("backward");
            },
            deleteHardLineForward() {
                return this.deleteInDirection("forward");
            },
            deleteSoftLineBackward() {
                return this.deleteInDirection("backward");
            },
            deleteSoftLineForward() {
                return this.deleteInDirection("forward");
            },
            deleteWordBackward() {
                return this.deleteInDirection("backward");
            },
            deleteWordForward() {
                return this.deleteInDirection("forward");
            },
            formatBackColor() {
                return this.activateAttributeIfSupported(
                    "backgroundColor",
                    this.event.data
                );
            },
            formatBold() {
                return this.toggleAttributeIfSupported("bold");
            },
            formatFontColor() {
                return this.activateAttributeIfSupported(
                    "color",
                    this.event.data
                );
            },
            formatFontName() {
                return this.activateAttributeIfSupported(
                    "font",
                    this.event.data
                );
            },
            formatIndent() {
                var t;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.canIncreaseNestingLevel()
                )
                    return this.withTargetDOMRange(function () {
                        var t;
                        return null === (t = this.responder) || void 0 === t
                            ? void 0
                            : t.increaseNestingLevel();
                    });
            },
            formatItalic() {
                return this.toggleAttributeIfSupported("italic");
            },
            formatJustifyCenter() {
                return this.toggleAttributeIfSupported("justifyCenter");
            },
            formatJustifyFull() {
                return this.toggleAttributeIfSupported("justifyFull");
            },
            formatJustifyLeft() {
                return this.toggleAttributeIfSupported("justifyLeft");
            },
            formatJustifyRight() {
                return this.toggleAttributeIfSupported("justifyRight");
            },
            formatOutdent() {
                var t;
                if (
                    null !== (t = this.responder) &&
                    void 0 !== t &&
                    t.canDecreaseNestingLevel()
                )
                    return this.withTargetDOMRange(function () {
                        var t;
                        return null === (t = this.responder) || void 0 === t
                            ? void 0
                            : t.decreaseNestingLevel();
                    });
            },
            formatRemove() {
                this.withTargetDOMRange(function () {
                    for (const i in null === (t = this.responder) ||
                    void 0 === t
                        ? void 0
                        : t.getCurrentAttributes()) {
                        var t, e;
                        null === (e = this.responder) ||
                            void 0 === e ||
                            e.removeCurrentAttribute(i);
                    }
                });
            },
            formatSetBlockTextDirection() {
                return this.activateAttributeIfSupported(
                    "blockDir",
                    this.event.data
                );
            },
            formatSetInlineTextDirection() {
                return this.activateAttributeIfSupported(
                    "textDir",
                    this.event.data
                );
            },
            formatStrikeThrough() {
                return this.toggleAttributeIfSupported("strike");
            },
            formatSubscript() {
                return this.toggleAttributeIfSupported("sub");
            },
            formatSuperscript() {
                return this.toggleAttributeIfSupported("sup");
            },
            formatUnderline() {
                return this.toggleAttributeIfSupported("underline");
            },
            historyRedo() {
                var t;
                return null === (t = this.delegate) || void 0 === t
                    ? void 0
                    : t.inputControllerWillPerformRedo();
            },
            historyUndo() {
                var t;
                return null === (t = this.delegate) || void 0 === t
                    ? void 0
                    : t.inputControllerWillPerformUndo();
            },
            insertCompositionText() {
                return (
                    (this.composing = !0), this.insertString(this.event.data)
                );
            },
            insertFromComposition() {
                return (
                    (this.composing = !1), this.insertString(this.event.data)
                );
            },
            insertFromDrop() {
                const t = this.deleteByDragRange;
                var e;
                if (t)
                    return (
                        (this.deleteByDragRange = null),
                        null === (e = this.delegate) ||
                            void 0 === e ||
                            e.inputControllerWillMoveText(),
                        this.withTargetDOMRange(function () {
                            var e;
                            return null === (e = this.responder) || void 0 === e
                                ? void 0
                                : e.moveTextFromRange(t);
                        })
                    );
            },
            insertFromPaste() {
                var t;
                const { dataTransfer: e } = this.event,
                    i = { dataTransfer: e },
                    n = e.getData("URL"),
                    r = e.getData("text/html");
                if (n) {
                    var o;
                    let t;
                    this.event.preventDefault(), (i.type = "text/html");
                    const r = e.getData("public.url-name");
                    (t = r ? qt(r).trim() : n),
                        (i.html = this.createLinkHTML(n, t)),
                        null === (o = this.delegate) ||
                            void 0 === o ||
                            o.inputControllerWillPaste(i),
                        this.withTargetDOMRange(function () {
                            var t;
                            return null === (t = this.responder) || void 0 === t
                                ? void 0
                                : t.insertHTML(i.html);
                        }),
                        (this.afterRender = () => {
                            var t;
                            return null === (t = this.delegate) || void 0 === t
                                ? void 0
                                : t.inputControllerDidPaste(i);
                        });
                } else if (Ct(e)) {
                    var s;
                    (i.type = "text/plain"),
                        (i.string = e.getData("text/plain")),
                        null === (s = this.delegate) ||
                            void 0 === s ||
                            s.inputControllerWillPaste(i),
                        this.withTargetDOMRange(function () {
                            var t;
                            return null === (t = this.responder) || void 0 === t
                                ? void 0
                                : t.insertString(i.string);
                        }),
                        (this.afterRender = () => {
                            var t;
                            return null === (t = this.delegate) || void 0 === t
                                ? void 0
                                : t.inputControllerDidPaste(i);
                        });
                } else if (r) {
                    var a;
                    this.event.preventDefault(),
                        (i.type = "text/html"),
                        (i.html = r),
                        null === (a = this.delegate) ||
                            void 0 === a ||
                            a.inputControllerWillPaste(i),
                        this.withTargetDOMRange(function () {
                            var t;
                            return null === (t = this.responder) || void 0 === t
                                ? void 0
                                : t.insertHTML(i.html);
                        }),
                        (this.afterRender = () => {
                            var t;
                            return null === (t = this.delegate) || void 0 === t
                                ? void 0
                                : t.inputControllerDidPaste(i);
                        });
                } else if (null !== (t = e.files) && void 0 !== t && t.length) {
                    var l;
                    (i.type = "File"),
                        (i.file = e.files[0]),
                        null === (l = this.delegate) ||
                            void 0 === l ||
                            l.inputControllerWillPaste(i),
                        this.withTargetDOMRange(function () {
                            var t;
                            return null === (t = this.responder) || void 0 === t
                                ? void 0
                                : t.insertFile(i.file);
                        }),
                        (this.afterRender = () => {
                            var t;
                            return null === (t = this.delegate) || void 0 === t
                                ? void 0
                                : t.inputControllerDidPaste(i);
                        });
                }
            },
            insertFromYank() {
                return this.insertString(this.event.data);
            },
            insertLineBreak() {
                return this.insertString("\n");
            },
            insertLink() {
                return this.activateAttributeIfSupported(
                    "href",
                    this.event.data
                );
            },
            insertOrderedList() {
                return this.toggleAttributeIfSupported("number");
            },
            insertParagraph() {
                var t;
                return (
                    null === (t = this.delegate) ||
                        void 0 === t ||
                        t.inputControllerWillPerformTyping(),
                    this.withTargetDOMRange(function () {
                        var t;
                        return null === (t = this.responder) || void 0 === t
                            ? void 0
                            : t.insertLineBreak();
                    })
                );
            },
            insertReplacementText() {
                return this.insertString(
                    this.event.dataTransfer.getData("text/plain"),
                    { updatePosition: !1 }
                );
            },
            insertText() {
                var t;
                return this.insertString(
                    this.event.data ||
                        (null === (t = this.event.dataTransfer) || void 0 === t
                            ? void 0
                            : t.getData("text/plain"))
                );
            },
            insertTranspose() {
                return this.insertString(this.event.data);
            },
            insertUnorderedList() {
                return this.toggleAttributeIfSupported("bullet");
            },
        });
    const sn = function (t) {
            const e = document.createRange();
            return (
                e.setStart(t.startContainer, t.startOffset),
                e.setEnd(t.endContainer, t.endOffset),
                e
            );
        },
        an = (t) => {
            var e;
            return Array.from(
                (null === (e = t.dataTransfer) || void 0 === e
                    ? void 0
                    : e.types) || []
            ).includes("Files");
        },
        ln = function (t) {
            const e = t.clipboardData;
            if (e)
                return (
                    e.types.includes("Files") &&
                    1 === e.types.length &&
                    e.files.length >= 1
                );
        },
        cn = function (t) {
            const e = t.clipboardData;
            if (e)
                return e.types.includes("text/plain") && 1 === e.types.length;
        },
        un = function (t) {
            const e = [];
            return (
                t.altKey && e.push("alt"),
                t.shiftKey && e.push("shift"),
                e.push(t.key),
                e
            );
        },
        hn = (t) => ({ x: t.clientX, y: t.clientY }),
        dn = "[data-trix-attribute]",
        gn = "[data-trix-action]",
        mn = "".concat(dn, ", ").concat(gn),
        pn = "[data-trix-dialog]",
        fn = "".concat(pn, "[data-trix-active]"),
        bn = "".concat(pn, " [data-trix-method]"),
        vn = "".concat(pn, " [data-trix-input]"),
        An = (t, e) => (
            e || (e = yn(t)),
            t.querySelector("[data-trix-input][name='".concat(e, "']"))
        ),
        xn = (t) => t.getAttribute("data-trix-action"),
        yn = (t) =>
            t.getAttribute("data-trix-attribute") ||
            t.getAttribute("data-trix-dialog-attribute");
    class Cn extends z {
        constructor(t) {
            super(t),
                (this.didClickActionButton =
                    this.didClickActionButton.bind(this)),
                (this.didClickAttributeButton =
                    this.didClickAttributeButton.bind(this)),
                (this.didClickDialogButton =
                    this.didClickDialogButton.bind(this)),
                (this.didKeyDownDialogInput =
                    this.didKeyDownDialogInput.bind(this)),
                (this.element = t),
                (this.attributes = {}),
                (this.actions = {}),
                this.resetDialogInputs(),
                f("mousedown", {
                    onElement: this.element,
                    matchingSelector: gn,
                    withCallback: this.didClickActionButton,
                }),
                f("mousedown", {
                    onElement: this.element,
                    matchingSelector: dn,
                    withCallback: this.didClickAttributeButton,
                }),
                f("click", {
                    onElement: this.element,
                    matchingSelector: mn,
                    preventDefault: !0,
                }),
                f("click", {
                    onElement: this.element,
                    matchingSelector: bn,
                    withCallback: this.didClickDialogButton,
                }),
                f("keydown", {
                    onElement: this.element,
                    matchingSelector: vn,
                    withCallback: this.didKeyDownDialogInput,
                });
        }
        didClickActionButton(t, e) {
            var i;
            null === (i = this.delegate) ||
                void 0 === i ||
                i.toolbarDidClickButton(),
                t.preventDefault();
            const n = xn(e);
            return this.getDialog(n)
                ? this.toggleDialog(n)
                : null === (r = this.delegate) || void 0 === r
                ? void 0
                : r.toolbarDidInvokeAction(n);
            var r;
        }
        didClickAttributeButton(t, e) {
            var i;
            null === (i = this.delegate) ||
                void 0 === i ||
                i.toolbarDidClickButton(),
                t.preventDefault();
            const n = yn(e);
            var r;
            this.getDialog(n)
                ? this.toggleDialog(n)
                : null === (r = this.delegate) ||
                  void 0 === r ||
                  r.toolbarDidToggleAttribute(n);
            return this.refreshAttributeButtons();
        }
        didClickDialogButton(t, e) {
            const i = A(e, { matchingSelector: pn });
            return this[e.getAttribute("data-trix-method")].call(this, i);
        }
        didKeyDownDialogInput(t, e) {
            if (13 === t.keyCode) {
                t.preventDefault();
                const i = e.getAttribute("name"),
                    n = this.getDialog(i);
                this.setAttribute(n);
            }
            if (27 === t.keyCode) return t.preventDefault(), this.hideDialog();
        }
        updateActions(t) {
            return (this.actions = t), this.refreshActionButtons();
        }
        refreshActionButtons() {
            return this.eachActionButton((t, e) => {
                t.disabled = !1 === this.actions[e];
            });
        }
        eachActionButton(t) {
            return Array.from(this.element.querySelectorAll(gn)).map((e) =>
                t(e, xn(e))
            );
        }
        updateAttributes(t) {
            return (this.attributes = t), this.refreshAttributeButtons();
        }
        refreshAttributeButtons() {
            return this.eachAttributeButton(
                (t, e) => (
                    (t.disabled = !1 === this.attributes[e]),
                    this.attributes[e] || this.dialogIsVisible(e)
                        ? (t.setAttribute("data-trix-active", ""),
                          t.classList.add("trix-active"))
                        : (t.removeAttribute("data-trix-active"),
                          t.classList.remove("trix-active"))
                )
            );
        }
        eachAttributeButton(t) {
            return Array.from(this.element.querySelectorAll(dn)).map((e) =>
                t(e, yn(e))
            );
        }
        applyKeyboardCommand(t) {
            const e = JSON.stringify(t.sort());
            for (const t of Array.from(
                this.element.querySelectorAll("[data-trix-key]")
            )) {
                const i = t.getAttribute("data-trix-key").split("+");
                if (JSON.stringify(i.sort()) === e)
                    return b("mousedown", { onElement: t }), !0;
            }
            return !1;
        }
        dialogIsVisible(t) {
            const e = this.getDialog(t);
            if (e) return e.hasAttribute("data-trix-active");
        }
        toggleDialog(t) {
            return this.dialogIsVisible(t)
                ? this.hideDialog()
                : this.showDialog(t);
        }
        showDialog(t) {
            var e, i;
            this.hideDialog(),
                null === (e = this.delegate) ||
                    void 0 === e ||
                    e.toolbarWillShowDialog();
            const n = this.getDialog(t);
            n.setAttribute("data-trix-active", ""),
                n.classList.add("trix-active"),
                Array.from(n.querySelectorAll("input[disabled]")).forEach(
                    (t) => {
                        t.removeAttribute("disabled");
                    }
                );
            const r = yn(n);
            if (r) {
                const e = An(n, t);
                e && ((e.value = this.attributes[r] || ""), e.select());
            }
            return null === (i = this.delegate) || void 0 === i
                ? void 0
                : i.toolbarDidShowDialog(t);
        }
        setAttribute(t) {
            const e = yn(t),
                i = An(t, e);
            return i.willValidate && !i.checkValidity()
                ? (i.setAttribute("data-trix-validate", ""),
                  i.classList.add("trix-validate"),
                  i.focus())
                : (null === (n = this.delegate) ||
                      void 0 === n ||
                      n.toolbarDidUpdateAttribute(e, i.value),
                  this.hideDialog());
            var n;
        }
        removeAttribute(t) {
            var e;
            const i = yn(t);
            return (
                null === (e = this.delegate) ||
                    void 0 === e ||
                    e.toolbarDidRemoveAttribute(i),
                this.hideDialog()
            );
        }
        hideDialog() {
            const t = this.element.querySelector(fn);
            var e;
            if (t)
                return (
                    t.removeAttribute("data-trix-active"),
                    t.classList.remove("trix-active"),
                    this.resetDialogInputs(),
                    null === (e = this.delegate) || void 0 === e
                        ? void 0
                        : e.toolbarDidHideDialog(
                              ((t) => t.getAttribute("data-trix-dialog"))(t)
                          )
                );
        }
        resetDialogInputs() {
            Array.from(this.element.querySelectorAll(vn)).forEach((t) => {
                t.setAttribute("disabled", "disabled"),
                    t.removeAttribute("data-trix-validate"),
                    t.classList.remove("trix-validate");
            });
        }
        getDialog(t) {
            return this.element.querySelector(
                "[data-trix-dialog=".concat(t, "]")
            );
        }
    }
    class Rn extends Oi {
        constructor(t) {
            let { editorElement: e, document: i, html: n } = t;
            super(...arguments),
                (this.editorElement = e),
                (this.selectionManager = new Li(this.editorElement)),
                (this.selectionManager.delegate = this),
                (this.composition = new gi()),
                (this.composition.delegate = this),
                (this.attachmentManager = new hi(
                    this.composition.getAttachments()
                )),
                (this.attachmentManager.delegate = this),
                (this.inputController =
                    2 === M.getLevel()
                        ? new on(this.editorElement)
                        : new Qi(this.editorElement)),
                (this.inputController.delegate = this),
                (this.inputController.responder = this.composition),
                (this.compositionController = new Ni(
                    this.editorElement,
                    this.composition
                )),
                (this.compositionController.delegate = this),
                (this.toolbarController = new Cn(
                    this.editorElement.toolbarElement
                )),
                (this.toolbarController.delegate = this),
                (this.editor = new xi(
                    this.composition,
                    this.selectionManager,
                    this.editorElement
                )),
                i ? this.editor.loadDocument(i) : this.editor.loadHTML(n);
        }
        registerSelectionManager() {
            return It.registerSelectionManager(this.selectionManager);
        }
        unregisterSelectionManager() {
            return It.unregisterSelectionManager(this.selectionManager);
        }
        render() {
            return this.compositionController.render();
        }
        reparse() {
            return this.composition.replaceHTML(this.editorElement.innerHTML);
        }
        compositionDidChangeDocument(t) {
            if (
                (this.notifyEditorElement("document-change"),
                !this.handlingInput)
            )
                return this.render();
        }
        compositionDidChangeCurrentAttributes(t) {
            return (
                (this.currentAttributes = t),
                this.toolbarController.updateAttributes(this.currentAttributes),
                this.updateCurrentActions(),
                this.notifyEditorElement("attributes-change", {
                    attributes: this.currentAttributes,
                })
            );
        }
        compositionDidPerformInsertionAtRange(t) {
            this.pasting && (this.pastedRange = t);
        }
        compositionShouldAcceptFile(t) {
            return this.notifyEditorElement("file-accept", { file: t });
        }
        compositionDidAddAttachment(t) {
            const e = this.attachmentManager.manageAttachment(t);
            return this.notifyEditorElement("attachment-add", {
                attachment: e,
            });
        }
        compositionDidEditAttachment(t) {
            this.compositionController.rerenderViewForObject(t);
            const e = this.attachmentManager.manageAttachment(t);
            return (
                this.notifyEditorElement("attachment-edit", { attachment: e }),
                this.notifyEditorElement("change")
            );
        }
        compositionDidChangeAttachmentPreviewURL(t) {
            return (
                this.compositionController.invalidateViewForObject(t),
                this.notifyEditorElement("change")
            );
        }
        compositionDidRemoveAttachment(t) {
            const e = this.attachmentManager.unmanageAttachment(t);
            return this.notifyEditorElement("attachment-remove", {
                attachment: e,
            });
        }
        compositionDidStartEditingAttachment(t, e) {
            return (
                (this.attachmentLocationRange =
                    this.composition.document.getLocationRangeOfAttachment(t)),
                this.compositionController.installAttachmentEditorForAttachment(
                    t,
                    e
                ),
                this.selectionManager.setLocationRange(
                    this.attachmentLocationRange
                )
            );
        }
        compositionDidStopEditingAttachment(t) {
            this.compositionController.uninstallAttachmentEditor(),
                (this.attachmentLocationRange = null);
        }
        compositionDidRequestChangingSelectionToLocationRange(t) {
            if (!this.loadingSnapshot || this.isFocused())
                return (
                    (this.requestedLocationRange = t),
                    (this.compositionRevisionWhenLocationRangeRequested =
                        this.composition.revision),
                    this.handlingInput ? void 0 : this.render()
                );
        }
        compositionWillLoadSnapshot() {
            this.loadingSnapshot = !0;
        }
        compositionDidLoadSnapshot() {
            this.compositionController.refreshViewCache(),
                this.render(),
                (this.loadingSnapshot = !1);
        }
        getSelectionManager() {
            return this.selectionManager;
        }
        attachmentManagerDidRequestRemovalOfAttachment(t) {
            return this.removeAttachment(t);
        }
        compositionControllerWillSyncDocumentView() {
            return (
                this.inputController.editorWillSyncDocumentView(),
                this.selectionManager.lock(),
                this.selectionManager.clearSelection()
            );
        }
        compositionControllerDidSyncDocumentView() {
            return (
                this.inputController.editorDidSyncDocumentView(),
                this.selectionManager.unlock(),
                this.updateCurrentActions(),
                this.notifyEditorElement("sync")
            );
        }
        compositionControllerDidRender() {
            this.requestedLocationRange &&
                (this.compositionRevisionWhenLocationRangeRequested ===
                    this.composition.revision &&
                    this.selectionManager.setLocationRange(
                        this.requestedLocationRange
                    ),
                (this.requestedLocationRange = null),
                (this.compositionRevisionWhenLocationRangeRequested = null)),
                this.renderedCompositionRevision !==
                    this.composition.revision &&
                    (this.runEditorFilters(),
                    this.composition.updateCurrentAttributes(),
                    this.notifyEditorElement("render")),
                (this.renderedCompositionRevision = this.composition.revision);
        }
        compositionControllerDidFocus() {
            return (
                this.isFocusedInvisibly() &&
                    this.setLocationRange({ index: 0, offset: 0 }),
                this.toolbarController.hideDialog(),
                this.notifyEditorElement("focus")
            );
        }
        compositionControllerDidBlur() {
            return this.notifyEditorElement("blur");
        }
        compositionControllerDidSelectAttachment(t, e) {
            return (
                this.toolbarController.hideDialog(),
                this.composition.editAttachment(t, e)
            );
        }
        compositionControllerDidRequestDeselectingAttachment(t) {
            const e =
                this.attachmentLocationRange ||
                this.composition.document.getLocationRangeOfAttachment(t);
            return this.selectionManager.setLocationRange(e[1]);
        }
        compositionControllerWillUpdateAttachment(t) {
            return this.editor.recordUndoEntry("Edit Attachment", {
                context: t.id,
                consolidatable: !0,
            });
        }
        compositionControllerDidRequestRemovalOfAttachment(t) {
            return this.removeAttachment(t);
        }
        inputControllerWillHandleInput() {
            (this.handlingInput = !0), (this.requestedRender = !1);
        }
        inputControllerDidRequestRender() {
            this.requestedRender = !0;
        }
        inputControllerDidHandleInput() {
            if (((this.handlingInput = !1), this.requestedRender))
                return (this.requestedRender = !1), this.render();
        }
        inputControllerDidAllowUnhandledInput() {
            return this.notifyEditorElement("change");
        }
        inputControllerDidRequestReparse() {
            return this.reparse();
        }
        inputControllerWillPerformTyping() {
            return this.recordTypingUndoEntry();
        }
        inputControllerWillPerformFormatting(t) {
            return this.recordFormattingUndoEntry(t);
        }
        inputControllerWillCutText() {
            return this.editor.recordUndoEntry("Cut");
        }
        inputControllerWillPaste(t) {
            return (
                this.editor.recordUndoEntry("Paste"),
                (this.pasting = !0),
                this.notifyEditorElement("before-paste", { paste: t })
            );
        }
        inputControllerDidPaste(t) {
            return (
                (t.range = this.pastedRange),
                (this.pastedRange = null),
                (this.pasting = null),
                this.notifyEditorElement("paste", { paste: t })
            );
        }
        inputControllerWillMoveText() {
            return this.editor.recordUndoEntry("Move");
        }
        inputControllerWillAttachFiles() {
            return this.editor.recordUndoEntry("Drop Files");
        }
        inputControllerWillPerformUndo() {
            return this.editor.undo();
        }
        inputControllerWillPerformRedo() {
            return this.editor.redo();
        }
        inputControllerDidReceiveKeyboardCommand(t) {
            return this.toolbarController.applyKeyboardCommand(t);
        }
        inputControllerDidStartDrag() {
            this.locationRangeBeforeDrag =
                this.selectionManager.getLocationRange();
        }
        inputControllerDidReceiveDragOverPoint(t) {
            return this.selectionManager.setLocationRangeFromPointRange(t);
        }
        inputControllerDidCancelDrag() {
            this.selectionManager.setLocationRange(
                this.locationRangeBeforeDrag
            ),
                (this.locationRangeBeforeDrag = null);
        }
        locationRangeDidChange(t) {
            return (
                this.composition.updateCurrentAttributes(),
                this.updateCurrentActions(),
                this.attachmentLocationRange &&
                    !wt(this.attachmentLocationRange, t) &&
                    this.composition.stopEditingAttachment(),
                this.notifyEditorElement("selection-change")
            );
        }
        toolbarDidClickButton() {
            if (!this.getLocationRange())
                return this.setLocationRange({ index: 0, offset: 0 });
        }
        toolbarDidInvokeAction(t) {
            return this.invokeAction(t);
        }
        toolbarDidToggleAttribute(t) {
            if (
                (this.recordFormattingUndoEntry(t),
                this.composition.toggleCurrentAttribute(t),
                this.render(),
                !this.selectionFrozen)
            )
                return this.editorElement.focus();
        }
        toolbarDidUpdateAttribute(t, e) {
            if (
                (this.recordFormattingUndoEntry(t),
                this.composition.setCurrentAttribute(t, e),
                this.render(),
                !this.selectionFrozen)
            )
                return this.editorElement.focus();
        }
        toolbarDidRemoveAttribute(t) {
            if (
                (this.recordFormattingUndoEntry(t),
                this.composition.removeCurrentAttribute(t),
                this.render(),
                !this.selectionFrozen)
            )
                return this.editorElement.focus();
        }
        toolbarWillShowDialog(t) {
            return (
                this.composition.expandSelectionForEditing(),
                this.freezeSelection()
            );
        }
        toolbarDidShowDialog(t) {
            return this.notifyEditorElement("toolbar-dialog-show", {
                dialogName: t,
            });
        }
        toolbarDidHideDialog(t) {
            return (
                this.thawSelection(),
                this.editorElement.focus(),
                this.notifyEditorElement("toolbar-dialog-hide", {
                    dialogName: t,
                })
            );
        }
        freezeSelection() {
            if (!this.selectionFrozen)
                return (
                    this.selectionManager.lock(),
                    this.composition.freezeSelection(),
                    (this.selectionFrozen = !0),
                    this.render()
                );
        }
        thawSelection() {
            if (this.selectionFrozen)
                return (
                    this.composition.thawSelection(),
                    this.selectionManager.unlock(),
                    (this.selectionFrozen = !1),
                    this.render()
                );
        }
        canInvokeAction(t) {
            return (
                !!this.actionIsExternal(t) ||
                !(
                    null === (e = this.actions[t]) ||
                    void 0 === e ||
                    null === (e = e.test) ||
                    void 0 === e ||
                    !e.call(this)
                )
            );
            var e;
        }
        invokeAction(t) {
            return this.actionIsExternal(t)
                ? this.notifyEditorElement("action-invoke", { actionName: t })
                : null === (e = this.actions[t]) ||
                  void 0 === e ||
                  null === (e = e.perform) ||
                  void 0 === e
                ? void 0
                : e.call(this);
            var e;
        }
        actionIsExternal(t) {
            return /^x-./.test(t);
        }
        getCurrentActions() {
            const t = {};
            for (const e in this.actions) t[e] = this.canInvokeAction(e);
            return t;
        }
        updateCurrentActions() {
            const t = this.getCurrentActions();
            if (!kt(t, this.currentActions))
                return (
                    (this.currentActions = t),
                    this.toolbarController.updateActions(this.currentActions),
                    this.notifyEditorElement("actions-change", {
                        actions: this.currentActions,
                    })
                );
        }
        runEditorFilters() {
            let t = this.composition.getSnapshot();
            if (
                (Array.from(this.editor.filters).forEach((e) => {
                    const { document: i, selectedRange: n } = t;
                    (t = e.call(this.editor, t) || {}),
                        t.document || (t.document = i),
                        t.selectedRange || (t.selectedRange = n);
                }),
                (e = t),
                (i = this.composition.getSnapshot()),
                !wt(e.selectedRange, i.selectedRange) ||
                    !e.document.isEqualTo(i.document))
            )
                return this.composition.loadSnapshot(t);
            var e, i;
        }
        updateInputElement() {
            const t = (function (t, e) {
                const i = li[e];
                if (i) return i(t);
                throw new Error("unknown content type: ".concat(e));
            })(
                this.compositionController.getSerializableElement(),
                "text/html"
            );
            return this.editorElement.setInputElementValue(t);
        }
        notifyEditorElement(t, e) {
            switch (t) {
                case "document-change":
                    this.documentChangedSinceLastRender = !0;
                    break;
                case "render":
                    this.documentChangedSinceLastRender &&
                        ((this.documentChangedSinceLastRender = !1),
                        this.notifyEditorElement("change"));
                    break;
                case "change":
                case "attachment-add":
                case "attachment-edit":
                case "attachment-remove":
                    this.updateInputElement();
            }
            return this.editorElement.notify(t, e);
        }
        removeAttachment(t) {
            return (
                this.editor.recordUndoEntry("Delete Attachment"),
                this.composition.removeAttachment(t),
                this.render()
            );
        }
        recordFormattingUndoEntry(t) {
            const e = gt(t),
                i = this.selectionManager.getLocationRange();
            if (e || !Dt(i))
                return this.editor.recordUndoEntry("Formatting", {
                    context: this.getUndoContext(),
                    consolidatable: !0,
                });
        }
        recordTypingUndoEntry() {
            return this.editor.recordUndoEntry("Typing", {
                context: this.getUndoContext(this.currentAttributes),
                consolidatable: !0,
            });
        }
        getUndoContext() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            return [
                this.getLocationContext(),
                this.getTimeContext(),
                ...Array.from(e),
            ];
        }
        getLocationContext() {
            const t = this.selectionManager.getLocationRange();
            return Dt(t) ? t[0].index : t;
        }
        getTimeContext() {
            return q.interval > 0
                ? Math.floor(new Date().getTime() / q.interval)
                : 0;
        }
        isFocused() {
            var t;
            return (
                this.editorElement ===
                (null === (t = this.editorElement.ownerDocument) || void 0 === t
                    ? void 0
                    : t.activeElement)
            );
        }
        isFocusedInvisibly() {
            return this.isFocused() && !this.getLocationRange();
        }
        get actions() {
            return this.constructor.actions;
        }
    }
    Ae(Rn, "actions", {
        undo: {
            test() {
                return this.editor.canUndo();
            },
            perform() {
                return this.editor.undo();
            },
        },
        redo: {
            test() {
                return this.editor.canRedo();
            },
            perform() {
                return this.editor.redo();
            },
        },
        link: {
            test() {
                return this.editor.canActivateAttribute("href");
            },
        },
        increaseNestingLevel: {
            test() {
                return this.editor.canIncreaseNestingLevel();
            },
            perform() {
                return this.editor.increaseNestingLevel() && this.render();
            },
        },
        decreaseNestingLevel: {
            test() {
                return this.editor.canDecreaseNestingLevel();
            },
            perform() {
                return this.editor.decreaseNestingLevel() && this.render();
            },
        },
        attachFiles: {
            test: () => !0,
            perform() {
                return M.pickFiles(this.editor.insertFiles);
            },
        },
    }),
        Rn.proxyMethod("getSelectionManager().setLocationRange"),
        Rn.proxyMethod("getSelectionManager().getLocationRange");
    var Sn = Object.freeze({
            __proto__: null,
            AttachmentEditorController: Pi,
            CompositionController: Ni,
            Controller: Oi,
            EditorController: Rn,
            InputController: Ki,
            Level0InputController: Qi,
            Level2InputController: on,
            ToolbarController: Cn,
        }),
        En = Object.freeze({
            __proto__: null,
            MutationObserver: Ui,
            SelectionChangeObserver: Ft,
        }),
        kn = Object.freeze({
            __proto__: null,
            FileVerificationOperation: Vi,
            ImagePreloadOperation: Ce,
        });
    bt(
        "trix-toolbar",
        "%t {\n  display: block;\n}\n\n%t {\n  white-space: nowrap;\n}\n\n%t [data-trix-dialog] {\n  display: none;\n}\n\n%t [data-trix-dialog][data-trix-active] {\n  display: block;\n}\n\n%t [data-trix-dialog] [data-trix-validate]:invalid {\n  background-color: #ffdddd;\n}"
    );
    class Ln extends HTMLElement {
        connectedCallback() {
            "" === this.innerHTML && (this.innerHTML = U.getDefaultHTML());
        }
    }
    let Dn = 0;
    const wn = function (t) {
            if (!t.hasAttribute("contenteditable"))
                return (
                    t.setAttribute("contenteditable", ""),
                    (function (t) {
                        let e =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : {};
                        return (e.times = 1), f(t, e);
                    })("focus", { onElement: t, withCallback: () => Tn(t) })
                );
        },
        Tn = function (t) {
            return Bn(t), Fn(t);
        },
        Bn = function (t) {
            var e, i;
            if (
                null !== (e = (i = document).queryCommandSupported) &&
                void 0 !== e &&
                e.call(i, "enableObjectResizing")
            )
                return (
                    document.execCommand("enableObjectResizing", !1, !1),
                    f("mscontrolselect", { onElement: t, preventDefault: !0 })
                );
        },
        Fn = function (t) {
            var e, i;
            if (
                null !== (e = (i = document).queryCommandSupported) &&
                void 0 !== e &&
                e.call(i, "DefaultParagraphSeparator")
            ) {
                const { tagName: t } = n.default;
                if (["div", "p"].includes(t))
                    return document.execCommand(
                        "DefaultParagraphSeparator",
                        !1,
                        t
                    );
            }
        },
        In = a.forcesObjectResizing
            ? { display: "inline", width: "auto" }
            : { display: "inline-block", width: "1px" };
    bt(
        "trix-editor",
        "%t {\n    display: block;\n}\n\n%t:empty:not(:focus)::before {\n    content: attr(placeholder);\n    color: graytext;\n    cursor: text;\n    pointer-events: none;\n    white-space: pre-line;\n}\n\n%t a[contenteditable=false] {\n    cursor: text;\n}\n\n%t img {\n    max-width: 100%;\n    height: auto;\n}\n\n%t "
            .concat(e, " figcaption textarea {\n    resize: none;\n}\n\n%t ")
            .concat(
                e,
                " figcaption textarea.trix-autoresize-clone {\n    position: absolute;\n    left: -9999px;\n    max-height: 0px;\n}\n\n%t "
            )
            .concat(
                e,
                " figcaption[data-trix-placeholder]:empty::before {\n    content: attr(data-trix-placeholder);\n    color: graytext;\n}\n\n%t [data-trix-cursor-target] {\n    display: "
            )
            .concat(In.display, " !important;\n    width: ")
            .concat(
                In.width,
                " !important;\n    padding: 0 !important;\n    margin: 0 !important;\n    border: none !important;\n}\n\n%t [data-trix-cursor-target=left] {\n    vertical-align: top !important;\n    margin-left: -1px !important;\n}\n\n%t [data-trix-cursor-target=right] {\n    vertical-align: bottom !important;\n    margin-right: -1px !important;\n}"
            )
    );
    class Pn extends HTMLElement {
        get trixId() {
            return this.hasAttribute("trix-id")
                ? this.getAttribute("trix-id")
                : (this.setAttribute("trix-id", ++Dn), this.trixId);
        }
        get labels() {
            const t = [];
            this.id &&
                this.ownerDocument &&
                t.push(
                    ...Array.from(
                        this.ownerDocument.querySelectorAll(
                            "label[for='".concat(this.id, "']")
                        ) || []
                    )
                );
            const e = A(this, { matchingSelector: "label" });
            return e && [this, null].includes(e.control) && t.push(e), t;
        }
        get toolbarElement() {
            var t;
            if (this.hasAttribute("toolbar"))
                return null === (t = this.ownerDocument) || void 0 === t
                    ? void 0
                    : t.getElementById(this.getAttribute("toolbar"));
            if (this.parentNode) {
                const t = "trix-toolbar-".concat(this.trixId);
                this.setAttribute("toolbar", t);
                const e = k("trix-toolbar", { id: t });
                return this.parentNode.insertBefore(e, this), e;
            }
        }
        get form() {
            var t;
            return null === (t = this.inputElement) || void 0 === t
                ? void 0
                : t.form;
        }
        get inputElement() {
            var t;
            if (this.hasAttribute("input"))
                return null === (t = this.ownerDocument) || void 0 === t
                    ? void 0
                    : t.getElementById(this.getAttribute("input"));
            if (this.parentNode) {
                const t = "trix-input-".concat(this.trixId);
                this.setAttribute("input", t);
                const e = k("input", { type: "hidden", id: t });
                return (
                    this.parentNode.insertBefore(e, this.nextElementSibling), e
                );
            }
        }
        get editor() {
            var t;
            return null === (t = this.editorController) || void 0 === t
                ? void 0
                : t.editor;
        }
        get name() {
            var t;
            return null === (t = this.inputElement) || void 0 === t
                ? void 0
                : t.name;
        }
        get value() {
            var t;
            return null === (t = this.inputElement) || void 0 === t
                ? void 0
                : t.value;
        }
        set value(t) {
            var e;
            (this.defaultValue = t),
                null === (e = this.editor) ||
                    void 0 === e ||
                    e.loadHTML(this.defaultValue);
        }
        notify(t, e) {
            if (this.editorController)
                return b("trix-".concat(t), { onElement: this, attributes: e });
        }
        setInputElementValue(t) {
            this.inputElement && (this.inputElement.value = t);
        }
        connectedCallback() {
            this.hasAttribute("data-trix-internal") ||
                (wn(this),
                (function (t) {
                    if (!t.hasAttribute("role"))
                        t.setAttribute("role", "textbox");
                })(this),
                (function (t) {
                    if (
                        t.hasAttribute("aria-label") ||
                        t.hasAttribute("aria-labelledby")
                    )
                        return;
                    const e = function () {
                        const e = Array.from(t.labels)
                                .map((e) => {
                                    if (!e.contains(t)) return e.textContent;
                                })
                                .filter((t) => t),
                            i = e.join(" ");
                        return i
                            ? t.setAttribute("aria-label", i)
                            : t.removeAttribute("aria-label");
                    };
                    e(), f("focus", { onElement: t, withCallback: e });
                })(this),
                this.editorController ||
                    (b("trix-before-initialize", { onElement: this }),
                    (this.editorController = new Rn({
                        editorElement: this,
                        html: (this.defaultValue = this.value),
                    })),
                    requestAnimationFrame(() =>
                        b("trix-initialize", { onElement: this })
                    )),
                this.editorController.registerSelectionManager(),
                this.registerResetListener(),
                this.registerClickListener(),
                (function (t) {
                    if (
                        !document.querySelector(":focus") &&
                        t.hasAttribute("autofocus") &&
                        document.querySelector("[autofocus]") === t
                    )
                        t.focus();
                })(this));
        }
        disconnectedCallback() {
            var t;
            return (
                null === (t = this.editorController) ||
                    void 0 === t ||
                    t.unregisterSelectionManager(),
                this.unregisterResetListener(),
                this.unregisterClickListener()
            );
        }
        registerResetListener() {
            return (
                (this.resetListener = this.resetBubbled.bind(this)),
                window.addEventListener("reset", this.resetListener, !1)
            );
        }
        unregisterResetListener() {
            return window.removeEventListener("reset", this.resetListener, !1);
        }
        registerClickListener() {
            return (
                (this.clickListener = this.clickBubbled.bind(this)),
                window.addEventListener("click", this.clickListener, !1)
            );
        }
        unregisterClickListener() {
            return window.removeEventListener("click", this.clickListener, !1);
        }
        resetBubbled(t) {
            if (!t.defaultPrevented && t.target === this.form)
                return this.reset();
        }
        clickBubbled(t) {
            if (t.defaultPrevented) return;
            if (this.contains(t.target)) return;
            const e = A(t.target, { matchingSelector: "label" });
            return e && Array.from(this.labels).includes(e)
                ? this.focus()
                : void 0;
        }
        reset() {
            this.value = this.defaultValue;
        }
    }
    const Nn = {
        VERSION: t,
        config: V,
        core: ci,
        models: Di,
        views: wi,
        controllers: Sn,
        observers: En,
        operations: kn,
        elements: Object.freeze({
            __proto__: null,
            TrixEditorElement: Pn,
            TrixToolbarElement: Ln,
        }),
        filters: Object.freeze({
            __proto__: null,
            Filter: bi,
            attachmentGalleryFilter: vi,
        }),
    };
    return (
        Object.assign(Nn, Di),
        (window.Trix = Nn),
        setTimeout(function () {
            customElements.get("trix-toolbar") ||
                customElements.define("trix-toolbar", Ln),
                customElements.get("trix-editor") ||
                    customElements.define("trix-editor", Pn);
        }, 0),
        Nn
    );
});
