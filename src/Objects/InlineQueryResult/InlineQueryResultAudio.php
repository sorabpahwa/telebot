<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 *
 * @property string               $type                  Type of the result, must be audio
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $audio_url             A valid URL for the audio file
 * @property string               $title                 Title
 * @property string               $caption               _Optional_. Caption, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the audio caption. See formatting options for more details.
 * @property string               $performer             _Optional_. Performer
 * @property int                  $audio_duration        _Optional_. Audio duration in seconds
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the audio
 */
class InlineQueryResultAudio extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'audio_url' => 'string',
            'title' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'performer' => 'string',
            'audio_duration' => 'integer',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
