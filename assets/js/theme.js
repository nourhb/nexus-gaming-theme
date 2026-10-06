/**
 * Nexus — front-end interactions.
 *
 * Vanilla JS: live ticker duplication, animated stat counters,
 * scroll reveal, sticky header state, back-to-top.
 * Respects prefers-reduced-motion.
 */

(function () {
	'use strict';

	var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* --- Duplicate ticker content for a seamless loop --- */
	document.querySelectorAll('.nexus-ticker').forEach(function (ticker) {
		var track = ticker.querySelector('.nexus-ticker-track');
		if (track && !prefersReduced) {
			track.innerHTML += track.innerHTML;
		}
	});

	/* --- Animated counters --- */
	function formatCompact(n) {
		if (n >= 1000000) {
			return (n / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
		}
		if (n >= 1000) {
			return (n / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
		}
		return String(n);
	}

	function animateCount(el) {
		var target = parseInt(el.getAttribute('data-count'), 10);
		var compact = el.getAttribute('data-format') === 'compact';
		if (isNaN(target)) {
			return;
		}
		if (prefersReduced) {
			el.textContent = compact ? formatCompact(target) : target.toLocaleString('en-US');
			return;
		}
		var duration = 1600;
		var start = null;
		function step(timestamp) {
			if (!start) {
				start = timestamp;
			}
			var progress = Math.min((timestamp - start) / duration, 1);
			var eased = 1 - Math.pow(1 - progress, 3);
			var value = Math.round(target * eased);
			el.textContent = compact ? formatCompact(value) : value.toLocaleString('en-US');
			if (progress < 1) {
				window.requestAnimationFrame(step);
			}
		}
		window.requestAnimationFrame(step);
	}

	var counters = document.querySelectorAll('.nexus-count');
	if ('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					animateCount(entry.target);
					obs.unobserve(entry.target);
				}
			});
		}, { threshold: 0.4 });
		counters.forEach(function (el) { observer.observe(el); });
	} else {
		counters.forEach(animateCount);
	}

	/* --- Scroll reveal --- */
	var revealEls = document.querySelectorAll('.nexus-reveal');
	if (prefersReduced || !('IntersectionObserver' in window)) {
		revealEls.forEach(function (el) { el.classList.add('is-in'); });
	} else {
		var revealObs = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-in');
					obs.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });
		revealEls.forEach(function (el) { revealObs.observe(el); });
	}

	/* --- Sticky header state --- */
	var header = document.querySelector('.nexus-header');
	var backTop = document.createElement('button');
	backTop.className = 'nexus-back-top';
	backTop.setAttribute('aria-label', 'Back to top');
	backTop.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>';
	document.body.appendChild(backTop);

	function onScroll() {
		var y = window.scrollY || window.pageYOffset;
		if (header) {
			header.classList.toggle('is-scrolled', y > 24);
		}
		backTop.classList.toggle('is-visible', y > 600);
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	backTop.addEventListener('click', function () {
		window.scrollTo({ top: 0, behavior: prefersReduced ? 'auto' : 'smooth' });
	});
})();
