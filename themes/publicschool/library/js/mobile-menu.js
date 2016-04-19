var ps = ps || {};

(function($){
	ps.MobileMenu = {
		init: function(){
			// Cache jQuery Selectors
			this.$filterMenu = $('.gallery-filter-mobile');
			this.$filterMenuHeader = $('header', this.$filterMenu);
			this.$filterHeaderSpan = $('.gallery-filter-mobile header span');
			this.$filterButtons = $('button', this.$filterMenu);
			this.$seeAllBtn = $('button', this.$filterMenu).first();

			// Cache relevant heights
			this.seeAllBtnHeight = this.$seeAllBtn.outerHeight();
			this.filterMenuHeaderHeight = this.$filterMenuHeader.outerHeight();
			this.openMenuHeight = this.$filterButtons.length * this.seeAllBtnHeight;
			// this.openMenuHeight = window.outerHeight;
			this.closedMenuHeight = this.seeAllBtnHeight;

			// Set counts of items
			this.$filterButtons.length;

			this.initializeDropdown();

			this.bindEvents();
		},

		initializeDropdown: function(){
			this.$filterMenu.addClass('initialized');
			this.$filterMenu.css({
				height: this.closedMenuHeight
			});

			this.$filterButtons.show();
		},		

		bindEvents: function(){
			var _this = this;

			_this.$filterMenuHeader.on('click', function(){
				_this.toggleFilterMenu();
			});

			_this.$filterButtons.on('click', function(){
				_this.closeFilterMenu();
				_this.setActiveFilter(this);
			});
		},

		toggleFilterMenu: function(){
			if(this.$filterMenu.is('.open')){
				this.closeFilterMenu();
			} else {
				this.openFilterMenu();
			}
		},

		openFilterMenu: function(){
			this.$filterMenu.addClass('open').css({
				height: this.openMenuHeight
			});
		},

		closeFilterMenu: function(){
			this.$filterMenu.removeClass('open').css({
				height: this.closedMenuHeight
			});		
		},

		setActiveFilter: function(filterBtn){
			this.$activeFilterBtn = $(filterBtn);

			this.$filterHeaderSpan.html(this.$activeFilterBtn.text());

			this.$filterMenu.find('.hidden').removeClass('hidden');
			this.$activeFilterBtn.addClass('hidden');
		}
	}

	$(function(){
		ps.MobileMenu.init();
	});
})(jQuery);