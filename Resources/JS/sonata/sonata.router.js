var Router = new function() {
    this.Controller = "",
    this.Action = "",
    this.Params = null,
    this.route = function(Controller, Action) {
        Router.Controller = Controller;
        Router.Action = Action;
        try {
            eval(Controller+"Controller."+Action+"()");
        }
        catch (e) {
            Router.Params = null;
        }
    }
}