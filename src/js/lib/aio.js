function aio(options) {
	const ms = "ms";
	let wh = window.innerHeight;
	let eh;
	let height;
	let els;

	// options - more to do
	let offset = options.offset;
	let speed = options.speed;
	let delay = options.delay;

	//get the elements by data attr
	els = document.querySelectorAll('[data-aio-in]');

	// set elements initial state
	els.forEach(aioInitState);

	// sets the speed and delay of element based on either data attr or options (options overrides)
	function aioInitState(el) {
		// sets element duration and delay
		speed = speed ? speed + ms : el.getAttribute('data-aio-speed') + ms;
		delay = delay ? delay + ms : el.getAttribute('data-aio-delay') + ms;

		el.style.animationDuration = speed;
		el.style.animationDelay = delay;
		el.classList.add('aio');

		console.log(el);

	}


	// checks if the element is inside viewport
	function elBoundries(el) {
		let rect = el.getBoundingClientRect();
		let style = getComputedStyle(el);
		let pt = parseFloat(style.paddingTop);
		let pb = parseFloat(style.paddingBottom);

		let top = rect.top + pt;
		let bottom = rect.bottom - pb;

		return (
			top >= 0 &&
			bottom <= (window.innerHeight || document.documentElement.clientHeight)
		);

	}

	function animateIn(el) {
		let animationIn = el.getAttribute('data-aio-in');
		let animationOut = el.getAttribute('data-aio-out');

		if (!animationOut) {
			let animationOut = 'aio-out';
		};
		if (!el.classList.contains(animationIn)) {
			el.classList.add(animationIn);
		}
	}

	function animateOut(el) {
		let animationIn = el.getAttribute('data-aio-in');
		let animationOut = el.getAttribute('data-aio-out');

		if (!animationOut) {
			animationOut = 'aio-out';
		};
		if (!el.classList.contains(animationOut)) {
			el.classList.add(animationOut);
		}

		if (el.classList.contains(animationIn)) {
			el.classList.remove(animationIn);
		}

	}

	// animates the element
	function aioSetState(el) {
		console.log(elBoundries(el));

		elBoundries(el) ? animateIn(el) : animateOut(el);

	}

	// listen for load and scroll event
	document.addEventListener('load', aioScrollHandler);
	document.addEventListener('scroll', aioScrollHandler);

	// handle the events
	function aioScrollHandler() {
		els.forEach(aioSetState);
	}
}