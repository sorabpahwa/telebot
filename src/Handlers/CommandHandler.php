<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

/**
 * Abstract class for creating Telegram command handlers
 * @package WeStacks\TeleBot\Handlers
 */
abstract class CommandHandler extends UpdateHandler
{
    /**
     * Command aliases
     * @var string[]
     */
    protected static $aliases = [];

    /**
     * Command descriptioin
     * @var string
     */
    protected static $description = null;

    /**
     * Get BotCommand foreach command `aliases` and `description`
     * @return BotCommand[]
     */
    public static function getBotCommand()
    {
        $data = [];
        
        foreach (static::$aliases as $name)
        {
            $data[] = new BotCommand([
                'command' => $name,
                'description' => static::$description
            ]);
        }

        return $data;
    }

    public static function trigger(Update $update)
    {
        if (!$message = $update->message) return false;
        if (!$entities = $message->entities) return false;

        foreach ($entities as $entity)
        {
            if ($entity->type != 'bot_command') continue;

            $command = substr($message->text, $entity->offset, $entity->length);
            if (in_array($command, static::$aliases)) return true;
        }

        return false;
    }
}
