"use strict";

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

var e = React.createElement;

var LikeButton =
/*#__PURE__*/
function (_React$Component) {
  _inherits(LikeButton, _React$Component);

  function LikeButton(props) {
    var _this;

    _classCallCheck(this, LikeButton);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(LikeButton).call(this, props));
    _this.state = {
      valu: 10,
      buy: 10
    };
    _this.valuechange = _this.valuechange.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(LikeButton, [{
    key: "valuechange",
    value: function valuechange(e) {
      var v, p;
      v = Math.abs(parseInt(e.target.value));

      if (v >= 100) {
        p = v - Math.floor(v * 5 / 100);
      }

      if (v >= 200) {
        p = v - Math.floor(v * 10 / 100);
      }

      if (v >= 400) {
        p = v - Math.floor(v * 15 / 100);
      }

      if (v >= 800) {
        p = v - Math.floor(v * 20 / 100);
      }

      if (v >= 1600) {
        p = v - Math.floor(v * 25 / 100);
      }

      if (v >= 4000) {
        p = v - Math.floor(v * 30 / 100);
      }

      if (v < 100) {
        p = v;
      }

      if (v < 10) {
        p = 10;
        v = 10;
      }

      this.setState({
        valu: v,
        buy: p
      });
    }
  }, {
    key: "render",
    value: function render() {
      return React.createElement("div", {
        className: "form-group has-feedback"
      }, React.createElement("div", {
        className: "col-md-4"
      }, React.createElement("label", {
        className: "control-label"
      }, "TZC Amount")), React.createElement("div", {
        className: "col-md-8"
      }, React.createElement("input", {
        type: "number",
        className: "form-control cEvent",
        name: "coins",
        id: "coinsAmount",
        value: this.state.valu,
        onChange: this.valuechange
      })), React.createElement("div", {
        className: "form-group"
      }, React.createElement("div", {
        className: "col-md-4"
      }, React.createElement("label", {
        className: "control-label"
      }, "Total price")), React.createElement("div", {
        className: "col-md-8"
      }, React.createElement("div", {
        className: "input-group"
      }, React.createElement("input", {
        type: "text",
        className: "form-control",
        id: "totalTZ",
        value: this.state.buy,
        disabled: "disabled"
      }), React.createElement("span", {
        className: "input-group-addon"
      }, "\u20AC")))), React.createElement("div", {
        className: "form-group"
      }, React.createElement("div", {
        className: "col-md-6"
      }, React.createElement("button", {
        type: "submit",
        className: "btn btn-primary"
      }, "Buy TopZone coins"))));
    }
  }]);

  return LikeButton;
}(React.Component);

ReactDOM.render(e(LikeButton), document.querySelector('#root'));