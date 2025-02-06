<?php

namespace app\View\Composers;

use Illuminate\View\View;

class TrainingComposer
{

    public function compose(View $view): void
    {
      $view->with('descanso',$this->getDescanso())
           ->with('fecha', $this->getDate()
      );
    }

    private function getDescanso()
    {
        // Lógica para obtener estadísticas
        return now();
    }
    private function getDate()
    {
      return date('Y-m-d', strtotime(now()));
    }

}