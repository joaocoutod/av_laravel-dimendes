<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;

use Carbon\Carbon;


class TasksController extends Controller
{   

    // VISUALIZAR TASK
    public function tasks_view(Request $request){

        // Valida autenticação para visualizar a página
        if (Auth::check()) {
            $ordem = $request->input('ordem');
            $filtroTitulo = $request->input('title_filter');
    
            // Consulta inicial de todas as tarefas
            $query = Tasks::query();
    
            // Aplicar filtro por título, se fornecido
            if ($filtroTitulo) {
                $query->where('title', 'like', '%' . $filtroTitulo . '%');
            }
    
            // Ordenar as tarefas de acordo com a opção selecionada ou por data de criação
            if ($ordem == 'title') {
                $query->orderBy('title');
            } else {
                $query->orderBy('created_at', 'desc');
            }
    
            $tasks = $query->get();
    
            // Formata as datas para exibir
            $formattedDates = [];
            foreach ($tasks as $item) {
                $formattedDate = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d-m-Y');
                $formattedDates[] = $formattedDate;
            }
    
            return view('tasks', [
                'tasks' => $tasks,
                'formattedDates' => $formattedDates,
                'ordem' => $ordem,
                'filtroTitulo' => $filtroTitulo,
            ]);
        }
    
        return redirect('/login');
    }


    // INSERIR TASK
    public function tasks_insert(Request $request){

        // Valida tamanho do título
        $tamanho = strlen($request->title);
        if ($tamanho < 3 || $tamanho > 100) {
            return back()->with('error', 'O título deve ter entre 3 e 100 caracteres.');
        }

        // verifica se o titulo ja existe
        if (Tasks::where('title', $request->title)->first()) {
            return back()->with('error', 'O titulo ('.$request->title.') já existe!');
        }


        // Valida tamanho do descrição
        $tamanho_descricao = strlen($request->description);
        if ($tamanho_descricao < 10 || $tamanho_descricao > 500) {
            return back()->with('error', 'A descrição deve ter entre 10 e 500 caracteres.');
        }      
        
        
        $task = new Tasks;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->id_dono = Auth::user()->id;

        $task->save();

        return redirect('/');

    }


    // ALTERAR TASK
    public function tasks_update(Request $request){

        if($request->title){
            // verifica se o titulo ja existe
            if (Tasks::where('title', $request->title)->where('id', '!=', $request->id)->first()) {
                return back()->with('error', 'O titulo ('.$request->title.') já existe!');
            }

            $upd_title = Tasks::where('id', $request->id)
                        ->update([
                            'title' => $request->title
                        ]);
            if($upd_title){
                return back()->with('success', 'O titulo da tarefa foi alterado com sucesso!');
            }else {
                return back()->with('error', 'Error ao alterar titulo da tarefa.');
            }
        }

        if($request->description){
            $upd_desc = Tasks::where('id', $request->id)
                        ->update([
                            'description' => $request->description
                        ]);
            if($upd_desc){
                return back()->with('success', 'A descrição da tarefa foi alterado com sucesso!');
            }else {
                return back()->with('error', 'Error ao alterar a descrição da tarefa.');
            }
        }

    }


    // DELETAR TASK
    public function tasks_delete($id){

        $id_auth = Auth::user()->id;
        $task = Tasks::where('id', $id)->where('id_dono', $id_auth)->First();

        if($task){

            //deletar task
            $delete_task = Tasks::where("id", $id)->delete();
            
            if(!$delete_task){
                return back()->with('error', "Error ao deletar $task->title)");
            }

            return back()->with('error', "A tarefa $task->title foi excluida");

        }
    }

}
