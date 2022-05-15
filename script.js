(function () {
	var count = 0, timer = setInterval(function () {
		ldP.innerHTML = "", ldH.style.display = 'block';
		for (var i = ++count % 3; i >= 0; i--) ldP.innerHTML += " .";
		if (count == 5) die('err'), clearInterval(timer);
	}, 1000), errorInfo = {
		'err': '连接服务器失败，刷新试试吧',
		'-1': '当前API不可用，之后再试试吧',
		'1': '当前API维护中，等会再试试吧',
		'2': '当前API不存在，请检查网址是否正确',
	};
	window.ready = function () {
		main.style.display = 'block';
		ldH.style.display = 'none';
		clearInterval(timer);
	}
	window.die = function (n) {
		var ref, n = String(n);
		document.readyState == "complete" ? (ref = function () {
			document.body.innerHTML = '<h1>错误！</h1>' + (errorInfo[n] ? errorInfo[n] : errorInfo.err), clearInterval(timer);
		})() : window.onload = ref;
	};
	ScpoAJAX.config.ordo = function () { die('err'); };
}());