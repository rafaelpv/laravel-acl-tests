<?php namespace Kodeine\Acl\Tests;

use Illuminate\Support\Facades\Schema;

class MigrationsTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function itCanPublishMigrations()
    {
        /** @var \Illuminate\Filesystem\Filesystem $filesystem */
        $filesystem = $this->app['files'];
        $src        = $this->getMigrationsSrcPath();
        $dest       = $this->getMigrationsDestPath();

        $this->assertCount(0, $filesystem->allFiles($dest));

        $this->publishMigrations();

        $this->assertEquals(
            count($filesystem->allFiles($src)),
            count($filesystem->allFiles($dest))
        );

        $filesystem->cleanDirectory($dest);
    }
}
