$(function(){
    // $('.minus').click(function () {
    //     var $input = $(this).parent().find('input');
    //     var count = parseInt($input.val()) - 1;
    //     count = count < 1 ? 1 : count;
    //     $input.val(count);
    //     $input.change();
    //     return false;
    // });
    // $('.plus').click(function () {
    //     var $input = $(this).parent().find('input');
    //     $input.val(parseInt($input.val()) + 1);
    //     $input.change();
    //     return false;
    // });
	$('.catalog-page .filter-button').click(function() {
		$('.catalog-page .filter').toggleClass('opened');
	});
	$(document).on('click', '.password-control, .password-control-nw, .password-control-wn', function(){
		var isPopup = $(this).closest('.fancybox-slide--current').length > 0;
		var passwordInput;

		if (isPopup) {
			// Если элемент в попапе, ищем соответствующий инпут
			passwordInput = $(this).closest('.fancybox-slide--current').find('#input-password');
		} else {
			// Если в body, определяем соответствующий инпут по классу кнопки
			if ($(this).hasClass('password-control-nw')) {
				passwordInput = $('#input-password-nw');
			} else if ($(this).hasClass('password-control-wn')){
				passwordInput = $('#input-confirm-wn');  // Исправленный ID
			} else {
				passwordInput = $('#input-password');
			}
		}

		// Переключаем тип поля пароля
		if (passwordInput.attr('type') === 'password'){
			$(this).addClass('view');
			passwordInput.attr('type', 'text');
		} else {
			$(this).removeClass('view');
			passwordInput.attr('type', 'password');
		}

		return false;
	});

	$('.header .search-link').click(function() {
		$('#cart_dropdown').css('display', 'none');
		$('.header form').toggleClass('opened');
	});
	$('.searchbg').click(function() {
		$('.searchbg').hide();
		$('.header form ul').hide();
		$('.header form').removeClass('opened');
	});
	$('.header .menu-button').click(function() {
		$('body').toggleClass('oh');
		$('.header .menu-button').toggleClass('active');
		$('.mobile-menu').toggleClass('opened');
	});
	$('.mobile-menu ul li a.with_sub').click(function() {
		$(this).toggleClass('active');
		$(this).next('ul').slideToggle();
	});
	$('.header .catalog-button').click(function() {
		$('.header .catalog-button').toggleClass('active');
		$('body').toggleClass('oh');
		$('.site-menu').toggleClass('opened');
	});
	$('.site-menu ul li a.with_sub').click(function() {
		$(this).toggleClass('active');
		$(this).next('ul').slideToggle();
	});
	// $('.index-catalog-block .list').slick({
	// 	variableWidth: true,
	// 	responsive: [
	//     {
	//       breakpoint: 576,
	//       settings: {
	//         slidesToShow: 2,
	//         variableWidth: false,
	//         dots: true
	//       }
	//     }
	//   ]
	// });
	// $('.index-steps-block .list').slick({
	//   dots: true,
	//   arrows: false,
	//   speed: 300,
	//   slidesToShow: 3,
	//   slidesToScroll: 1,
	//   responsive: [
	//     {
	//       breakpoint: 768,
	//       settings: {
	//         slidesToShow: 2
	//       }
	//     },
	//     {
	//       breakpoint: 576,
	//       settings: "unslick"
	//     }
	//   ]
	// });
	// $('.slider-for').slick({
	//   slidesToShow: 1,
	//   slidesToScroll: 1,
	//   arrows: false,
	//   asNavFor: '.slider-nav'
	// });
	// $('.slider-nav').slick({
	//   slidesToShow: 4,
	//   slidesToScroll: 1,
	//   asNavFor: '.slider-for',
	//   arrows: false,
	//   vertical: true,
	//   focusOnSelect: true,
	//   responsive: [
	//     {
	//       breakpoint: 576,
	//       settings: {
	//         slidesToShow: 3,
	//         vertical: false
	//       }
	//     }
	//   ]
	// });
	// $('.item-advantages-block .list').slick({
	//   dots: true,
	//   arrows: false,
	//   speed: 300,
	//   slidesToShow: 3,
	//   slidesToScroll: 1,
	//   responsive: [
	//     {
	//       breakpoint: 768,
	//       settings: {
	//         slidesToShow: 2
	//       }
	//     },
	//     {
	//       breakpoint: 576,
	//       settings: {
	//         slidesToShow: 1
	//       }
	//     }
	//   ]
	// });
	// $('.slider-for2').slick({
	// });


/*	$('.index-catalog-block .list').slick({
		slidesToShow: 3, // Количество отображаемых карточек
		slidesToScroll: 1, // Количество прокручиваемых карточек за раз
		variableWidth: true, // Отключаем variableWidth для предотвращения неправильного отображения
		dots: true, // Отображаем точки навигации
		responsive: [
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2,
					variableWidth: false,
					dots: true
				}
			}
		]
	});

	$('.index-steps-block .list').slick({
		dots: true,
		arrows: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 576,
				settings: "unslick"
			}
		]
	});*/
	$('.index-catalog-block .list').slick({
		slidesToShow: 4, // Количество отображаемых карточек
		slidesToScroll: 1, // Количество прокручиваемых карточек за раз
		variableWidth: false, // Отключаем variableWidth для предотвращения неправильного отображения
		dots: true, // Отображаем точки навигации
		responsive: [
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2,
					variableWidth: false,
					dots: true
				}
			}
		]
	});

	$('.index-steps-block .list').slick({
		dots: true,
		arrows: false,
		speed: 300,
		slidesToShow: 4, // Количество отображаемых карточек
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 576,
				settings: "unslick"
			}
		]
	});



	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		arrows: false,
		vertical: true,
		focusOnSelect: true,
		responsive: [
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 3,
					vertical: false
				}
			}
		]
	});

	$('.item-advantages-block .list').slick({
		dots: true,
		arrows: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	$('.slider-for2').slick();
	// Получаем сохраненное значение из localStorage
	var activeMenuItem = localStorage.getItem('activeMenuItem');

	// Если есть сохраненное значение, применяем класс "active"
	if (activeMenuItem) {
		$('.top-menu ul li a[href="' + activeMenuItem + '"]').addClass("active");
	}

	// Флаг для отслеживания состояния активности
	var isMenuItemActive = false;

	// Обработчик события click
	$('.top-menu ul li a').click(function(event) {
		// Получаем href текущего элемента
		var href = $(this).attr('href');

		// Проверяем, имеет ли элемент класс "active"
		var isActive = $(this).hasClass("active");

		// Если элемент уже активен, предотвращаем переход по ссылке
		if (isActive || isMenuItemActive) {
			event.preventDefault();
			return;
		}

		// Устанавливаем флаг активности перед переходом
		isMenuItemActive = true;

		// Удаляем класс "active" у всех пунктов меню
		$('.top-menu ul li a').removeClass("active");

		// Добавляем класс "active" только к выбранному пункту меню
		$(this).addClass("active");

		// Сохраняем текущий элемент в localStorage
		localStorage.setItem('activeMenuItem', href);

		// Переходим по ссылке
		window.location.href = href;

		// Сбрасываем флаг активности после перехода
		isMenuItemActive = false;
	});

});