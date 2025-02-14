<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GitController extends Controller
{
    public function pushToGitHub()
    {
        // .env থেকে GIT_USERNAME এবং GIT_PAT_TOKEN আনুন
        $username = env('GIT_USERNAME');
        $token = env('GIT_PAT_TOKEN');
        $repoUrl = "https://$username:$token@github.com/$username/Practice.git";

        // লোকাল Git রিমোট ঠিক করা
        shell_exec("git remote remove origin 2>/dev/null");
        shell_exec("git remote add origin $repoUrl");

        // Git Add, Commit & Push
        shell_exec("git add .");
        shell_exec('git commit -m "Auto commit from Laravel"');
        $output = shell_exec("git push -u origin main 2>&1");

        return response()->json([
            'message' => 'Git push executed!',
            'output' => $output
        ]);
    }
}
