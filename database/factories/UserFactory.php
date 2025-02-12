<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Clase UserFactory
 *
 * Esta fábrica permite la creación de instancias ficticias del modelo `User`
 * para pruebas y seeding en la base de datos.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Contraseña predeterminada utilizada en la fábrica.
     *
     * Se mantiene estática para evitar múltiples encriptaciones durante la generación
     * de usuarios en las pruebas.
     *
     * @var string|null
     */
    protected static ?string $password = null;

    /**
     * Define el estado por defecto del modelo `User`.
     *
     * Se generan valores ficticios para los atributos, incluyendo:
     * - Nombre aleatorio
     * - Email único y seguro
     * - Fecha de verificación de correo electrónico actual
     * - Contraseña encriptada
     * - Token de "remember me"
     *
     * @return array<string, mixed> Datos generados para un usuario.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Genera un nombre aleatorio
            'email' => fake()->unique()->safeEmail(), // Genera un correo único
            'email_verified_at' => now(), // Marca el correo como verificado
            'password' => static::$password ??= Hash::make('password'), // Contraseña encriptada
            'remember_token' => Str::random(10), // Token aleatorio
        ];
    }

    /**
     * Indica que el email del usuario no está verificado.
     *
     * Esta función se usa en pruebas donde se requiere un usuario sin verificar.
     *
     * @return static Devuelve una instancia del estado modificado.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
