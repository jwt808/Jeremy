<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

class QuestionsFlow extends Component
{
    public $questions;
    public $currentQuestionIndex = 0;
    public $selectedOptions = [];

    public function mount()
    {
        $gender = Session::get('gender');

        if (!$gender) {
            // Redirect back to home if gender is not selected
            return redirect()->route('home')->with('error', 'Please select your gender first.');
        }

        // Fetch all questions ordered by the 'order' field
        $this->questions = Question::orderBy('order')->with('options')->get();
    }

    public function answerQuestion($optionId)
    {
        $question = $this->questions[$this->currentQuestionIndex];
        $this->selectedOptions[$question->id] = $optionId;

        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
        } else {
            // After answering all questions, store the selected options in session
            Session::put('selectedOptions', $this->selectedOptions);

            // Redirect to the registration page
            return redirect()->route('register');
        }
    }

    public function render()
    {
        return view('livewire.auth.questions-flow')->layout('layouts.guest');
    }
}
