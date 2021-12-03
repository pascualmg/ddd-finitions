<?php

namespace pascualmg\dddfinitions\Tests\Domain\Bus;

use pascualmg\dddfinitions\Domain\Bus\Event\DomainEventSubscriber;
use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageBus;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;
use pascualmg\dddfinitions\Domain\Bus\MessageType;
use pascualmg\dddfinitions\Domain\ValueObject\StringValueObject;
use pascualmg\dddfinitions\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class MessageBusTest extends TestCase
{
    private $messageBus;

    private Message $someMesage;
    private MessageSubscriber $spySubscriber;

    public function test_given_a_message_when_publish_then_the_message_is_published(): void
    {

        $messageToPublish = ($this->someMesage)::fromArray([
                                                               'id' => Uuid::random(),
                                                               'payload' => [
                                                                   'foo' => 'bar',
                                                               ]
                                                           ]);

        $this->messageBus->subscribe($this->spySubscriber);
        $this->messageBus->dispatch($messageToPublish);

        self::assertEquals(1, $this->spySubscriber->counter);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->spySubscriber = new class implements DomainEventSubscriber {
            public int $counter = 0;

            public function __invoke(Message $domainEvent): void
            {
                echo 'rula';
                $this->counter++;
            }

            public function isSubscribedTo(Message $message): bool
            {
                return $message->name() === 'some_action';
            }

        };

        $this->messageBus = new class implements MessageBus {
            private array $subscribers = [];

            public function dispatch(Message $message): void
            {
                /** @var MessageSubscriber $subscriber */
                foreach ($this->subscribers as $subscriber) {
                    if ($subscriber->isSubscribedTo($message)) {
                        $subscriber($message);
                    }
                }
            }

            public function subscribe(MessageSubscriber $subscriber): void
            {
                $this->subscribers[] = $subscriber;
            }
        };

        $this->someMesage = new class extends Message {
            public function type(): string
            {
                return 'some_type_of_event';
            }
            public function name(): string
            {
                return 'some_action';
            }
        };
    }

}
