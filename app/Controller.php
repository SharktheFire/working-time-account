<?php

class Controller
{
    private $variables;

    public function __construct()
    {
        $variablesCollection = new Variables();
        $this->variables = $variablesCollection->getVariables();
        $this->workingTimeAccountService = new WorkingTimeAccountService();
    }

    public function renderMain(string $path)
    {
        $view = new View($this->overrideVariables(), $path);
        return $view->render();
    }

    public function renderProfile(string $path)
    {
        $view = new View($this->variables, $path);
        $this->workingTimeAccountService->getProfile();
        return $view->render();
    }

    public function renderErrorPage(string $path)
    {
        $view = new View($this->variables, $path);
        return $view->render();
    }

    public function renderAddTimeAction()
    {
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        if (isset($startTime) && isset($endTime)) {
            $this->workingTimeAccountService->addWorkingTime($startTime, $endTime);
            return $this->renderMain('/views/MainView.php');
        } else {
            // correct error handling
            echo "Bitte trage in beiden Feldern Zahlen ein!";
        }
    }

    private function overrideVariables() {
        $this->variables['main']['times'] = $this->workingTimeAccountService->getAllTimes();
        return $this->variables;
    }
}
