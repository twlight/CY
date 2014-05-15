+ function($) {"use strict";
	var SelectC = function(elemnt, options) {
		this.init(elemnt, options);
	}

	SelectC.DEFAULTS = {
		btnTpl : '<div class="selectC-btn"></div>',
		itemTpl : '<li class="selectC-item"><a href="javascript:;"></a></li>',
		menuTpl : '<ul class="selectC-menu"><li><a href="#">请选择</a></li></ul>',
		dwTpl : '<div class="selectC-dw">万元</div>',
		data : [{
			text : '10万',
			value : 10
		}, {
			text : '20万',
			value : 20
		}, {
			text : '30万',
			value : 30
		}],
		inputSelector : '',
		selectByValue : '',
		isShowDw : false,
		DWtext : '万元',
		isFocus : false,
		left : 0,
		change : function(val) {
		}
	}

	SelectC.prototype.init = function(element, options) {

		var that = this;
		this.$element = $(element);
		this.options = this.getOptions(options);
		this.pos = $.extend({}, this.$element.offset(), {
			height : this.$element[0].offsetHeight,
			width : this.$element[0].offsetWidth
		});
		this.$btn = $(this.options.btnTpl).insertAfter(this.$element);
		this.$menu = $(this.options.menuTpl).appendTo('body');

		this.$input = $(this.options.inputSelector);
		this.isShowMenu = false;

		if (this.options.isShowDw) {
			this.$dw = $(this.options.dwTpl).insertAfter(this.$element);
			//this.showDW();
		}

		if (this.options.selectByValue) {
			this.setSelectValue(this.options.selectByValue, this.options.selectByDw);
		}

		this.$menu.hide();

		this.$element.on('click', false, $.proxy(this.showMenu, this))

		this.$menu.on('click', false, $.proxy(this.menuClick, this)).on('mouseenter', 'li', $.proxy(this.itemMouseenter, this));

		this.$btn.on('click', false, $.proxy(this.btnClick, this));

		this.$input.on('blur', false, $.proxy(this.outFocus, this));

		this.$input.on('keypress', false, function() {
			that.hideMenu();
		});
		//$(':not(.daikuan)').on('click', false, $.proxy(this.hideMenu, this));
		$('body').on('click', false, $.proxy(this.windowClick, this));

		if (this.options.isFocus) {
			this.focus();
		}

		this.renderMenu();
		//this.showBtn();
	}

	SelectC.prototype.option = function(option) {
		switch (option) {
			case 'hide':
				this.hideAll();
				break;
			case 'show':
				this.showAll();
				break;
		}
	}

	SelectC.prototype.hideAll = function() {
		this.$btn.hide();
		if (this.options.isShowDw) {
			this.$dw.hide();
		}
	}

	SelectC.prototype.showAll = function() {
		this.$btn.show();
		if (this.options.isShowDw) {
			this.$dw.show();
		}
	}

	SelectC.prototype.windowClick = function(e) {
		if ($(e.target)[0] == this.$element[0] || $(e.target)[0] == this.$btn[0]) {

		} else {
			this.hideMenu();
		}
	}

	SelectC.prototype.menuClick = function(e) {
		this.select();
	}

	SelectC.prototype.btnClick = function(e) {
		if (this.isShowMenu) {
			this.hideMenu();
		} else {
			this.showMenu();
		}
	}

	SelectC.prototype.onKeypresss = function() {
		if (this.isShowMenu) {
			this.hideMenu();
		}
	}

	SelectC.prototype.itemMouseenter = function(e) {
		this.$menu.find('.active').removeClass('active');
		$(e.currentTarget).addClass('active');
	}

	SelectC.prototype.showBtn = function() {
		this.$btn.css({
			'position' : 'absolute',
			'left' : this.pos.left + this.pos.width + 'px',
			'top' : this.pos.top + 'px'
		});
	}

	SelectC.prototype.showDW = function() {
		this.$dw.css({
			'position' : 'absolute',
			'left' : this.pos.left + this.pos.width - 50 + 'px', //todo  50 修改
			'top' : this.pos.top + 'px'
		})
	}

	SelectC.prototype.showMenu = function() {
		this.pos = $.extend({}, this.$element.offset(), {
			height : this.$element[0].offsetHeight,
			width : this.$element[0].offsetWidth
		});
		this.$menu.css({
			'position' : 'absolute',
			'left' : (this.pos.left + this.options.left) + 'px',
			'top' : this.pos.top + this.pos.height + 'px'

		});
		this.$menu.show();
		this.isShowMenu = true;
	}

	SelectC.prototype.hideMenu = function() {
		this.$menu.hide()
		this.isShowMenu = false;
	}

	SelectC.prototype.renderMenu = function() {
		var items = this.options.data, that = this;
		items = $(items).map(function(i, item) {
			i = $(that.options.itemTpl).attr('data-value', item.value);
			i.attr('data-text', item.text);

			var dw = item.DWtext || that.options.DWtext;
			if (item.value == 'other') {
				i.find('a').html(item.text);
			} else if (that.options.isShowDw && dw) {
				i.find('a').html(item.text + dw);
				i.attr('data-dw', dw);
			} else {
				i.find('a').html(item.text);
			}

			return i[0]
		})
		this.$menu.html(items);
	}

	SelectC.prototype.select = function() {
		var value = this.$menu.find('.active').attr('data-value'), text = this.$menu.find('.active').attr('data-text'), dw = this.$menu.find('.active').attr('data-dw');
		this.setInputValue(value, dw);
		if (this.options.isShowDw && dw) {
			this.$dw.text(dw);
		}

		if (this.$element[0].tagName != 'INPUT') {
			this.$element.text(text)
		}
	}

	SelectC.prototype.setInputValue = function(val, dw) {
		if (val == 'other') {
			this.focus();
			this.hideMenu();
		} else {
			this.$input.val(val);
			this.options.change(val, dw);
		}

	}

	SelectC.prototype.getDefaults = function() {
		return SelectC.DEFAULTS
	}

	SelectC.prototype.getOptions = function(options) {
		options = $.extend({}, this.getDefaults(), this.$element.data(), options)
		return options
	}

	SelectC.prototype.setSelectValue = function(value, selectDw) {
		var that = this
		var isFinded = 0;
		$.each(this.options.data, function(n, v) {
			that.$dw.text(selectDw);

			if (v.value == value && v.DWtext == selectDw) {

				isFinded = 1;
				if (that.$element[0].tagName == 'INPUT') {
					that.setInputValue(value, selectDw);
				} else {
					that.$element.text(v.text);
					that.setInputValue(value, selectDw);
				}

			}

			if (isFinded == 0) {
				if (that.$element[0].tagName == 'INPUT') {
					that.setInputValue(value, selectDw);
				} else {
					that.$element.text(value);
					that.setInputValue(value, selectDw);
				}
			}

		})
	}

	SelectC.prototype.focus = function() {
		this.$input.val('');
		this.$input[0].focus();
		this.$dw.addClass('selectC-dw-force');
	}
	SelectC.prototype.outFocus = function() {
		this.$dw.removeClass('selectC-dw-force');
	}

	$.fn.selectC = function(option) {
		return this.each(function() {
			var $this = $(this);
			var data = $this.data('selectC');
			var options = typeof option == 'object' && option;
			if (!data) {
				$this.data('selectC', ( data = new SelectC(this, options)))
			} else {
				$this.data('selectC', data.option(option));
			}
		})
	}

	$.fn.selectC.Constructor = SelectC;
}(window.jQuery); 