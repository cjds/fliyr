var app=angular.module('Fliyr',['ngResource']);


app.constant('AUTH_EVENTS', {
  loginSuccess: 'auth-login-success',
  loginFailed: 'auth-login-failed',
  logoutSuccess: 'auth-logout-success',
  sessionTimeout: 'auth-session-timeout',
  notAuthenticated: 'auth-not-authenticated',
  notAuthorized: 'auth-not-authorized'
})


app.factory('AuthService', function ($http, Session) {
  var authService = {};
 
  authService.login = function (credentials) {

    return $http
      .post('index.php/login', credentials)
      .then(function (res) {
      	console.dir(res);
        Session.create(res.data.user.user_id);
        return res.data.user;
      });
  };
 
  authService.isAuthenticated = function () {
    return !!Session.userId;
  };
 
  return authService;
});

app.service('Session', function () {
  this.create = function ( userId) {
    this.userId = userId;
  };
  this.destroy = function () {
    this.userId = null;
  };
  return this;
})

// app.factory('user',function($resource){
// 	return {
// 		username:function(){
// 			console.log($resource('index.php/user-data?user_id=1', null,{
//        'get': { method:'GET'}}));
// 			return $resource('index.php/user-data?user_id=1', null,{
//        'get': { method:'GET'}});
// 		},
// 		user_id:function(){
// 			return '1'
// 		}
// 	}


// });

app.directive('venture',function(){
	return {
		restrict: "E",
		template: '<div><div ng-show="!ventureshow">{{details.venture_name}} <br> {{details.venture_description}}<br>'
				+'<positions data="details.positions" ></positions>'
				+'<ul ng-repeat="tag in details.tags"><tag name="{{tag.tag_name}}"></ul>'
				+'<span ng-click="ventureshow=true">Message</span></div>'
				+'<div ng-show="ventureshow"><textarea /><br /><span ng-click="ventureshow=false">Back</span></div></div>',
		scope: {
        	details:'='
        },
        replace: true,
		link:function($scope, element, attrs){
		}

	}
});

app.directive('positions',function(){
	return {
		restrict: "E",
		template:'<ul ng-repeat="position in data"><li>{{position.position_name}}:{{position.position_description}}</li></ul>',
		scope:{
			data:'='
		}
	}

})

app.directive('tag',function(){
	return{
		restrict:"E",
		template:"<li>{{name}}</li>",
		scope: {
            name: '@'
        }
	}
});


app.directive('modalDialog', function() {
  return {
    restrict: 'E',
    scope: {
      show: '='
    },
    replace: true, // Replace with the template below
    transclude: true, // we want to insert custom content inside the directive
    link: function(scope, element, attrs) {
      scope.dialogStyle = {};
      if (attrs.width)
        scope.dialogStyle.width = attrs.width;
      if (attrs.height)
        scope.dialogStyle.height = attrs.height;
      scope.hideModal = function() {
        scope.show = false;
      };
    },
    template: "<div class='ng-modal' ng-show='show'>"
  			+"<div class='ng-modal-overlay' ng-click='hideModal()'></div>"
  			+"<div class='ng-modal-dialog' ng-style='dialogStyle'>"
  			+"<div class='ng-modal-close' ng-click='hideModal()'>X</div>"
    		+"<div class='ng-modal-dialog-content' ng-transclude></div>"
  			+"</div>"
			+"</div>"
	};
});

app.controller('ApplicationController', function ($scope,AuthService) {
  $scope.currentUser = null;
  $scope.setCurrentUser = function (user) {
    $scope.currentUser = user;
  };

   $scope.modalShown = false;
   	$scope.createVentureDialog = function() {
   		$scope.modalShown = !$scope.modalShown;
  	};
});

app.controller('MainController',function($scope,$http){
 $http.get('index.php/get-ventures').
    success(function(data, status, headers, config) {
      $scope.ventures = data;
    }).
    error(function(data, status, headers, config) {
      // log error
    }); 
  
  
}	);

app.controller('LoginController', function ($scope, $rootScope, AUTH_EVENTS, AuthService) {
	  $scope.credentials = {
	    user_email: '',
	    password: ''
	  };
	  $scope.login = function (credentials) {
	    AuthService.login(credentials).then(function (user) {
	      $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
	      $scope.setCurrentUser(user);
	    }, function () {
	      $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
	    });
	  };
})