#!/usr/bin/perl

use strict;
use warnings;
use Net::Vypress::Chat;
use Net::IRC;
use Data::Dumper;

our $irc_channel = "#LocàëÜ";

my $vyc = Net::Vypress::Chat->new(
    'localip'   =>      '11.11.11.11',
    'debug'     =>      2
);

$SIG{INT} = sub { $vyc->shutdown() };
$SIG{KILL} = sub { $vyc->shutdown() };

my $irc = new Net::IRC;
our $conn = $irc->newconn(
    Nick    => '[-_-]',
    Server  => 'storm.elcom.ru',
    Port    =>  6667,
    Ircname => 'LocaJIb VyChat gate');
$conn->add_global_handler('376', \&on_connect);

if (fork()) {
    
    $irc->start;

} else {
    
    $vyc->nick('CHOBITS');
    $vyc->startup;
    $vyc->join('#Main');

    while (my @args = $vyc->readsock()) {
        print Dumper \@args;
        my $packet_type = shift @args;
        
        if ($packet_type eq 'msg') {
            my ($from, $message) = @args;
            my @lines = split /\n/, $message;
            foreach my $line (@lines) {
                $conn->privmsg($irc_channel, "[$from*] $line");
            }
        } elsif ($packet_type eq 'unknown') {
        } elsif ($packet_type eq 'who') {
        } elsif ($packet_type eq 'nick') {
            my ($from, $to) = @args;
            $conn->privmsg($irc_channel, "*** $from is now known as $to");
        } elsif ($packet_type eq 'join') {
            my ($from, $channel) = @args;
            $conn->privmsg($irc_channel, "*** $from has joined $channel");
        } elsif ($packet_type eq 'part') {
            my ($from, $channel) = @args;
            $conn->privmsg($irc_channel, "*** $from has left $channel");
        } elsif ($packet_type eq 'active') {
            my ($from) = @args;
            $conn->privmsg($irc_channel, "*** $from has joined VyChat");
        } elsif ($packet_type eq 'chat') {
            my ($channel, $from, $message) = @args;
            my @lines = split /\n/, $message;
            foreach my $line (@lines) {
                $conn->privmsg($irc_channel, "[$from] $line");
            }
        } else {
            my ($str) = @args;
            my @lines = split /\n/, $str;
            foreach my $line (@lines) {
                $conn->privmsg($irc_channel, "*** <$packet_type> $line");
            }
        }
    }

}


sub on_connect {
    my $self = shift;

    print "Joining $irc_channel...";
    $self->join($irc_channel);
    $self->privmsg($irc_channel, "ph34r my l33t skillz.");
}

