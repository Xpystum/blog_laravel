<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;

use Illuminate\Support\Collection;
use App\Modules\User\Domain\Models\Skill;
use App\Modules\User\Domain\Models\Profile;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class ProgresSkillBar extends Component
{

    public Collection $inputValue;
    public int $profileId;


    /**
     * @param int $profileId
     * @param EloquentCollection $inputValue
     *
     * @return [type]
     */
    public function mount(int $profileId, EloquentCollection $inputValue)
    {

        $arr = collect([]);

        $this->profileId = $profileId;
        $this->inputValue = collect([]);

        foreach ($inputValue as $item) {
            $this->mappingArrayForDB($item->name, $item->percent, $profileId);
        }


    }


    public function updateProgress(string $name, string $procent)
    {
        //устанавливаем новое значение, формируем массив
        $collect = $this->mappingArrayForDB($name, $procent, $this->profileId);

        $this->dispatch('skillBar', $collect);

        Skill::upsert(
            $this->inputValue->toArray(),                  // Массив данных для вставки/обновления
            ['name'],    // Поле или набор полей для определения уникальности
            ['percent', 'profile_id'] // Поля, которые необходимо обновлять
        );


    }

    /**
     * Формируем массив для массовой вставки в бд
     * @return array
     */
    public function mappingArrayForDB(string $name, string $procent, int $profileId) : Collection
    {

        $key = $this->inputValue->search(function ($item) use ($name) {
            return $item['name'] === $name;
        });

        if ($key !== false) {
            $this->inputValue->put($key, [
                'name' => $name,
                'percent' => (int) $procent,
                'profile_id' => $profileId,
            ]);
        } else {
            $this->inputValue->push(["name" => $name, "percent" => (int) $procent, "profile_id" => $profileId]);
        }


        return $this->inputValue;
    }

    public function render()
    {
        return view('livewire.profile.progres-skill-bar');
    }
}
