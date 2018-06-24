var app = angular.module('MyApp', [
	"chieffancypants.loadingBar",
	"ngAnimate", 
	"ui.bootstrap",
	'ui.select',
	'ngSanitize',
	'ngRoute',
     'checklist-model',
    'bic.module'
]);

app.config(['$httpProvider', function ($httpProvider) {
	$httpProvider.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
	$httpProvider.defaults.headers.common['Accept'] = 'application/json, text/javascript';
	$httpProvider.defaults.headers.common['Content-Type'] = 'application/json; charset=utf-8';
}]);

app.filter('formatDate', function() {
	return function (input) {
		var date = moment(input);
		return date.format('DD/MM/YYYY');
	}
});

app.filter('dateToISO', function() {
	return function(dateSTR) {
    var bYear = 543;
    var millies = 1000 * 60 * 60 * 24 * 365 * bYear;
    var o = dateSTR.replace(/-/g, "/"); 
        return Date.parse(o + " -0000"); 
	}
});


// แปลง เปน number
app.directive('convertToNumber', function() {
	return {
		require: 'ngModel',
		link: function(scope, element, attrs, ngModel) {
			ngModel.$parsers.push(function (val) {
				return val == null ? null : parseInt(val, 10);
			});
			ngModel.$formatters.push(function (val) {
				return val == null ? null : '' + val;
			});
		}
	}
});

// แปลง สติง เป็น ตัวเลข 
app.directive('stringToNumber', function() {

	return {
		require: 'ngModel',
		link: function (scope, element, attrs, ngModel) {
			ngModel.$parsers.push(function (value) {
				return value == null ? null : (parseFloat(value) || 0);
			});
			ngModel.$formatters.push(function (value) {
				return parseFloat(value);
			});
		}
	}
});


app.filter('start', function() {
	return function(input, start) {
		if(!input || !input.length) { return; }
		start = +start;
		return input.slice(start);
	}
});

app.controller("FormController", function ($scope, $http, 
	$location, $window,
	$filter, uibDateParser,$routeParams, Resource) {
    
    var ctrl = this;
    $scope.datepicker1 = {
        opened:false
    };
	$scope.datepicker3 = {
		opened:false
	};
    
    $scope.openDatepicker1 = function(){
        $scope.datepicker1.opened = true;
    };
	$scope.openDatepicker3 = function (){
		$scope.datepicker3.opened = true;
	}

	// model
	ctrl.GET = $location.search();
	$scope.myId = ctrl.GET.id;
	$scope.model = {
		id: -1, 
		state: "draft", 
		name: "SO*NEW*",		
		date_schedule: new Date(), 
	};
    console.log({log: "Initial sale order form", msg:$scope.model});
    $http.get('/people/hitory/load-form-ajax')
        .then(function (response) {
            $scope.states = resources.states;
        });
});