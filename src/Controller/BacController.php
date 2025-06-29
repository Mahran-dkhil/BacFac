<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BacController extends AbstractController
{
    private array $matieres = [
            'math' => [
                'math' => ['label' => 'Mathématiques', 'coef' => 4, 'controle' => true],
                'physique' => ['label' => 'Physique', 'coef' => 4, 'controle' => true],
                'sciences' => ['label' => 'Sciences de la Vie', 'coef' => 1, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1, 'controle' => false],
                'info' => ['label' => 'Informatique', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'sc' => [
                'sciences' => ['label' => 'Sciences de la Vie', 'coef' => 4, 'controle' => true],
                'physique' => ['label' => 'Physique', 'coef' => 4, 'controle' => true],
                'math' => ['label' => 'Mathématiques', 'coef' => 3, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1, 'controle' => false],
                'info' => ['label' => 'Informatique', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'tech' => [
                'math' => ['label' => 'Mathématiques', 'coef' => 3, 'controle' => true],
                'tech' => ['label' => 'Sciences Techniques', 'coef' => 3, 'controle' => true],
                'physique' => ['label' => 'Physique', 'coef' => 3, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1, 'controle' => false],
                'techP' => ['label' => 'Techniques Pratique', 'coef' => 1, 'controle' => false],
                'info' => ['label' => 'Informatique', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'eco' => [
                'economie' => ['label' => 'Économie', 'coef' => 3, 'controle' => true],
                'gestion' => ['label' => 'Gestion', 'coef' => 3, 'controle' => true],
                'math' => ['label' => 'Mathématiques', 'coef' => 2, 'controle' => true],
                'histgeo' => ['label' => 'Histoire-Géographie', 'coef' => 2, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1, 'controle' => false],
                'info' => ['label' => 'Informatique', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'lettres' => [
                'ar' => ['label' => 'Arabe', 'coef' => 4, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 4, 'controle' => true],
                'histgeo' => ['label' => 'Histoire-Géographie', 'coef' => 3, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 2, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 2, 'controle' => true],
                'info' => ['label' => 'Informatique', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'info' => [
                'algo' => ['label' => 'Algorithmique', 'coef' => 3, 'controle' => true],
                'math' => ['label' => 'Mathématiques', 'coef' => 3, 'controle' => true],
                'sti' => ['label' => 'Bases de Données', 'coef' => 3, 'controle' => true],
                'physique' => ['label' => 'Physique', 'coef' => 2, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1, 'controle' => false],
                'sport' => ['label' => 'Sport', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ],
            'sport' => [
                'sciences' => ['label' => 'Sciences Biologique', 'coef' => 3, 'controle' => true],
                'math' => ['label' => 'Mathématiques', 'coef' => 1, 'controle' => true],
                'physique' => ['label' => 'Physique', 'coef' => 1, 'controle' => true],
                'fr' => ['label' => 'Français', 'coef' => 1.5, 'controle' => true],
                'ang' => ['label' => 'Anglais', 'coef' => 1.5, 'controle' => true],
                'arb' => ['label' => 'Arabe', 'coef' => 1, 'controle' => true],
                'philo' => ['label' => 'Philosophie', 'coef' => 1.5, 'controle' => false],
                'sportth' => ['label' => 'Sport (Théorique)', 'coef' => 0.5, 'controle' => true],
                'sportp' => ['label' => 'Sport (Pratique)', 'coef' => 2.5, 'controle' => false],
                'sport' => ['label' => 'education phy', 'coef' => 1, 'controle' => false],
                'option' => ['label' => 'Option', 'coef' => 0, 'controle' => false],
            ]
        ];

    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $types = [
            'math' => 'Mathématiques',
            'sc' => 'Sciences',
            'tech' => 'Techniques',
            'eco' => 'Économie & Gestion',
            'lettres' => 'Lettres',
            'info' => 'Informatique',
            'sport' => 'Sport',
        ];

        $selectedType = $request->request->get('type');
        $subjects = [];

        if ($selectedType && isset($this->matieres[$selectedType])) {
            $subjects = $this->matieres[$selectedType];
        }

        $notes = $request->request->all('notes');
        $notesControle = $request->request->all('notes_controle');
        $isControlMode = $request->request->get('session_control') === '1';

        $mainResult = null;
        $mainScore = null;
        $newResult = null;
        $newScore = null;
        $error = false;
        $showControl = false;

        if ($request->isMethod('POST')) {
            // Always calculate principal session
            [$mainResult, $mainScore, $error] = $this->calculateMainResult($selectedType, $subjects, $notes);

            if ((!$error && $mainResult < 9 && $mainResult >= 7) || (!$error && $mainResult >= 9 && $mainResult < 10 && (($selectedType === 'lettres' && $notes['ar']+$notes['philo']<18) || ($selectedType === 'sport' && $notes['sciences']+$notes['sportth']<18) || ($selectedType === 'info' && $notes['algo']+$notes['math']<18) || ($selectedType === 'tech' && $notes['math']+$notes['tech']<18) || ($selectedType === 'eco' && $notes['economie']+$notes['gestion']<18) || ($selectedType === 'math' && $notes['math']+$notes['physique']<18) || ($selectedType === 'sc' && $notes['sciences']+$notes['physique']<18)))) {
                $showControl = true;
            }

            // If it's the control session, calculate it too
            if ($isControlMode) {
                [$newResult, $newScore, $error] = $this->calculateControlResult($selectedType, $subjects, $notes, $notesControle, $mainResult);
                $showControl = true;
            }
        }

        return $this->render('bac/index.html.twig', [
            'types' => $types,
            'selectedType' => $selectedType,
            'subjects' => $subjects,
            'mainResult' => $mainResult,
            'mainScore' => $mainScore,
            'newResult' => $newResult,
            'newScore' => $newScore,
            'showControl' => $showControl,
            'error' => $error,
            'controlMode' => $isControlMode,
            'oldNotes' => $notes
        ]);
    }

    private function calculateMainResult(string $type, array $subjects, array $notes): array
    {
        $somme = 0;
        $totalCoef = 0;
        $error = false;

        foreach ($subjects as $key => $data) {
            $coef = $data['coef'];

            if ($coef === 0) {
                $note = isset($notes[$key]) ? (float)$notes[$key] : 0;
                $somme += ($note >= 10) ? ($note - 10) : 0;
                continue;
            }

            if (!isset($notes[$key]) || $notes[$key] === '') {
                $error = true;
                break;
            }

            $note = (float)$notes[$key];
            $somme += $note * $coef;
            $totalCoef += $coef;
        }

        if ($error || $totalCoef === 0) {
            return [null, null, true];
        }

        $result = floor(($somme / $totalCoef)*100)/100;
        $score = $this->calculateScore($type, $notes, $result);

        return [$result, $score, false];
    }

    private function calculateControlResult(string $type, array $subjects, array $notes, array $notesControle, float $mainResult): array
    {
        $somme = 0;
        $totalCoef = 0;
        $error = false;

        foreach ($subjects as $key => $data) {
            $coef = $data['coef'];

            if ($coef === 0) {
                $note = isset($notes[$key]) ? (float)$notes[$key] : 0;
                $somme += ($note >= 10) ? ($note - 10) : 0;
                continue;
            }

            $note = $notes[$key] ?? null;
            $controleNote = $notesControle[$key] ?? null;

            if ($note === null || $note === '') {
                $error = true;
                break;
            }

            $note = (float)$note;
            if ($data['controle'] && $controleNote !== null && $controleNote !== '') {
                $noteControle = (float)$controleNote;
                $note = max($note, $noteControle);
            }

            $somme += $note * $coef;
            $totalCoef += $coef;
        }

        if ($error || $totalCoef === 0) {
            return [null, null, true];
        }

        $result = floor(($somme / $totalCoef)*100)/100;
        $score = $this->calculateControlScore($type, $notes, $notesControle, $result, $mainResult);

        return [$result, $score, false];
    }

    private function calculateScore(string $type, array $notes, float $result): float
    {
        $n = fn($key) => isset($notes[$key]) ? (float)$notes[$key] : 0;

        return match ($type) {
            'math' => round($result * 4 + 2 * $n('math') + 1.5 * $n('physique') + 0.5 * $n('sciences') + $n('fr') + $n('ang'), 2),
            'sc' => round($result * 4 + $n('math') + 1.5 * $n('physique') + 1.5 * $n('sciences') + $n('fr') + $n('ang'), 2),
            'tech' => round($result * 4 + 1.5 * $n('math') + $n('physique') + 1.5 * $n('tech') + $n('fr') + $n('ang'), 2),
            'eco' => round($result * 4 + 0.5 * $n('math') + 1.5 * $n('economie') + 1.5 * $n('gestion') + 0.5 * $n('histgeo') + $n('fr') + $n('ang'), 2),
            'lettres' => round($result * 4 + 1.5 * $n('ar') + 1.5 * $n('philo') + $n('histgeo') + $n('fr') + $n('ang'), 2),
            'info' => round($result * 4 + 1.5 * $n('math') + 1.5 * $n('algo') + 0.5 * $n('sti') + 0.5 * $n('physique') + $n('fr') + $n('ang'), 2),
            'sport' => round($result * 4 + 0.5 * $n('sportp') + $n('sportth') + 1.5 * $n('sciences') + 0.5 * $n('physique') + 0.5 * $n('philo') + $n('fr') + $n('ang'), 2),
            default => $result * 4
        };
    }
    private function calculateControlScore(string $type, array $notes, array $notesControle, float $result, float $mainResult): float
    {
        $n = function (string $key) use ($notes, $notesControle): float {
            $note = isset($notes[$key]) ? (float)$notes[$key] : 0;
            $controle = isset($notesControle[$key]) ? (float)$notesControle[$key] : 0;
            if (isset($controle) && $controle!== '' && $controle > 0) {
                return ($note*2+$controle)/3;
            }
            return $note;
        };

        return match ($type) {
            'math' => round((($mainResult*2+$result)/3) * 4 + 2 * $n('math') + 1.5 * $n('physique') + 0.5 * $n('sciences') + $n('fr') + $n('ang'), 2),
            'sc' => round((($mainResult*2+$result)/3) * 4 + $n('math') + 1.5 * $n('physique') + 1.5 * $n('sciences') + $n('fr') + $n('ang'), 2),
            'tech' => round((($mainResult*2+$result)/3) * 4 + 1.5 * $n('math') + $n('physique') + 1.5 * $n('tech') + $n('fr') + $n('ang'), 2),
            'eco' => round((($mainResult*2+$result)/3) * 4 + 0.5 * $n('math') + 1.5 * $n('economie') + 1.5 * $n('gestion') + 0.5 * $n('histgeo') + $n('fr') + $n('ang'), 2),
            'lettres' => round((($mainResult*2+$result)/3) * 4 + 1.5 * $n('ar') + 1.5 * $n('philo') + $n('histgeo') + $n('fr') + $n('ang'), 2),
            'info' => round((($mainResult*2+$result)/3) * 4 + 1.5 * $n('math') + 1.5 * $n('algo') + 0.5 * $n('sti') + 0.5 * $n('physique') + $n('fr') + $n('ang'), 2),
            'sport' => round((($mainResult*2+$result)/3) * 4 + 0.5 * $n('sportp') + $n('sportth') + 1.5 * $n('sciences') + 0.5 * $n('physique') + 0.5 * $n('philo') + $n('fr') + $n('ang'), 2),
            default => round((($mainResult*2+$result)/3) * 4, 2)
        };
    }


}
