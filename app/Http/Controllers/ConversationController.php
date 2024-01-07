<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;

class ConversationController extends Controller
{
    public function store(Request $request)
    {
        //rechercher avec id si conversation existe
        $conversation = Conversation::where('id_tache', $request->id_tache)->first();
        if($conversation == null){
            $conversation = new Conversation();
            $conversation->id_tache = $request->id_tache;
            $conversation->save();
        }

        $message = new Message();
        $message->contenu = $request->contenu;
        $message->date_envoi = date('Y-m-d H:i:s');
        $message->id_conversation = $conversation->id;
        $message->id_utilisateur = auth()->id();
        $message->save();

        $messageRetour = array(
            'contenu' => $message->contenu,
            'date_envoi' => $message->date_envoi,
            'pseudo' => auth()->user()->pseudo
        );
        return response()->json($messageRetour);
    }

    public function show(Request $request)
    {
        // récuperer la conversation et les messages en fonction du $id de la tache
        $id_tache = $request->input('id_tache');
        $conversation = Conversation::join('messages', 'conversations.id', 'messages.id_conversation')
        ->join('users', 'messages.id_utilisateur', 'users.id')
        ->select('messages.contenu', 'users.pseudo')
        ->where('conversations.id_tache', $id_tache)
        ->orderBy('messages.created_at', 'asc')
        ->get();

        return (response()->json([
            'conversation' => $conversation,
            'utilisateurCourant' => auth()->user()->pseudo,
        ]));
    }
}
