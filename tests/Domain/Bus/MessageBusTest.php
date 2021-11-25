<?php

namespace pascualmg\dddfinitions\Tests\Domain\Bus;

use pascualmg\dddfinitions\Domain\Bus\Event\DomainEventSubscriber;
use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageBus;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;
use pascualmg\dddfinitions\Domain\Bus\MessageType;
use pascualmg\dddfinitions\Domain\ValueObject\Name;
use pascualmg\dddfinitions\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class MessageBusTest extends TestCase
{
    private $messageBus;

    private Message $someMesage;
    private MessageSubscriber $spySubscriber;

    public function test_given_a_message_when_publish_then_the_message_is_published(): void
    {
        $this->messageBus->dispatch($this->someMesage);
        $this->messageBus->subscribe($this->spySubscriber);

        $this->assertTrue($this->spySubscriber->isInvokedWith($this->someMesage->payload()));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->spySubscriber = new class implements DomainEventSubscriber
        {


            public function __invoke(Message $domainEvent): mixed
            {
                // TODO: Implement __invoke() method.
            }

            public function isSubscribedTo(Message $message): bool
            {
                // TODO: Implement isSubscribedTo() method.
            }

            public function subscribedTo(): array
            {
                // TODO: Implement subscribedTo() method.
            }
        };
        $this->messageBus =
            new class implements MessageBus {
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
            public function __construct()
            {
                parent::__construct(Uuid::random(), []);
            }


            protected function type(): MessageType
            {
                return new MessageType(MessageType::DOMAIN_EVENT);
            }

            protected function name(): string
            {

                return 'some_evennt';
            }
        };
    }

}
