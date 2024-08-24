<?php

declare(strict_types=1);

namespace Mrazinshaikh\RectorPhpGroupImports;

use PhpParser\Node;
use Rector\Rector\AbstractRector;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;

/**
 * @see \Rector\Tests\TypeDeclaration\Rector\RectorGroupImportsRector\RectorGroupImportsRectorTest
 */
final class GroupImports extends AbstractRector implements ConfigurableRectorInterface
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('// Group imports', [
            new CodeSample(
                <<<'CODE_SAMPLE'
use Closure;
use DateTime;

use const App\AA;
use const App\BaA;
use const App\test\BaA2;

use Native\Laravel\Menu\Menu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\GlobalShortcut;
use PHPUnit\Framework\Attributes\Group;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\confirm;
use function Laravel\Prompt\test;
CODE_SAMPLE,
                <<<'CODE_SAMPLE'
use const App\{AA, BaA};
use const App\test\BaA2;

use Closure, DateTime;
use Native\Laravel\Menu\Menu;
use PHPUnit\Framework\Attributes\Group;
use Native\Laravel\Facades\{Dock, Window, ContextMenu, GlobalShortcut};

use function Laravel\Prompt\test;
use function Laravel\Prompts\{alert, confirm};
CODE_SAMPLE
            ),
        ]);
    }

    public function configure(array $configuration): void
    {
        // 
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [\PhpParser\Node\Stmt\Class_::class];
    }

    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        // @todo change the node
        echo PHP_EOL;
        print_r($node);
        echo PHP_EOL;
        exit;
        exit;

        return $node;
    }
}
